<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Notification;
use App\Models\Golongan;
use App\Models\Status;
use App\Models\Pages;
use App\Models\Periode;
use App\Models\Kecamatan;
use App\Models\Form_ijazah;

class FormPangkatIjazahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        $unreadCount = $notifications->where('read', false)->count();
        $status = Status::all();
        $form=Form_ijazah::all();

        return view('application.crud-form-ijazah.table-ijazah', compact( 'user', 'status', 'form', 'notifications', 'unreadCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat penyesuaian ijazah')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-ijazah.form-ijazah', compact('user', 'notifications', 'unreadCount', 'periode', 'golongan'));
        } else {
            return view('application.error-page.error');
        }
    }

    public function proses()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $Form_ijazah = Form_ijazah::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.proses.teble-ijazah', compact('notifications', 'Form_ijazah', 'user', 'unreadCount'));
    }

    public function prosesverifikator()
    {
        $user = Auth::user();
        $status = Status::all();
        $kecamatan = Kecamatan::all();
        $Form_ijazah = Form_ijazah::with('user')->paginate(5);
        return view('verifikator.proses.teble-ijazah', compact('Form_ijazah', 'user', 'status', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUpload = new Form_ijazah;
        $dataUpload->user_id = Auth::id();
        $dataUpload->periode = $request->periode;
        $dataUpload->nama = $request->nama;
        $dataUpload->nip = $request->nip;
        $dataUpload->golongan = $request->golongan;
        $dataUpload->jabatan = $request->jabatan;
        $dataUpload->unit_kerja = $request->unit_kerja;
        $dataUpload->date = $request->date;
        $dataUpload->nomor_wa = $request->nomor_wa;

        $fileFields = [
            'doc_suratPengantar',
            'doc_pangkatTerakhir',
            'doc_jabatanAtasan',
            'doc_penilaian2022',
            'doc_penilaian2023',
            'doc_pakKonvensional',
            'doc_pakIntegrasi',
            'doc_pakKonversi',
            'doc_ujiKopetensi',
            'doc_izinBelajar',
            'doc_uraianTugaslama',
            'doc_uraianTugasbaru',
            'doc_suratTandakelulusan',
            'doc_ijazah',
            'doc_transkripNilai',
            'doc_sertifikatAkreditasi',
            'doc_pangkalanData',
            'doc_skAlihtugas',
            'doc_skJF'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $upload = $request->file($field);
                $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                $upload->move(public_path('assets/documentijazah'), $nameFile);
                $dataUpload->$field = $nameFile;
            }
        }

        $dataUpload->save();

        return redirect('/table-jabatan-ijazah')->with('success', 'Data baru berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $form = Form_ijazah::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.crud-form-ijazah.detail-form', compact('form', 'notifications', 'user', 'unreadCount'));
    }

    public function showverifikator($id)
    {
        $user = Auth::user();
        $form = Form_ijazah::find($id);
        return view('verifikator.crud-form-ijazah.detail-form', ['form' => $form, 'user' =>$user]);
    }

    public function verifikasi($id)
    {
        $user = Auth::user();
        $status = Status::all();
        $form = Form_ijazah::find($id);
        return view('verifikator.crud-form-ijazah.verifikasi-form', ['form' => $form, 'user' =>$user, 'status' =>$status,]);
    }

    public function verifikasipost(Request $request, $id)
    {
        $data_update = Form_ijazah::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $updateData = [
            'status' => $validated['status'],
            'keterangan' => $validated['keterangan'],
        ];

        if ($request->hasFile('file')) {
            $upload = $request->file('file');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentFile'), $nameFile);
            $updateData['file'] = $nameFile;
        }

        $updated = $data_update->update($updateData);

        if ($updated) {
            if ($validated['status'] == 'Pembuatan_SK_Berhasil') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_ijazahs_id' => $data_update->id,
                    'status' => 'Pembuatan_SK_Berhasil',
                    'type' => 'formulir usulan kenaikan pangkat jabatan ijazah',
                    'data' => 'Dokumen Anda telah berhasil diverifikasi.',
                ]);
            } elseif ($validated['status'] == 'Ditolak') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_ijazahs_id' => $data_update->id,
                    'status' => 'Ditolak',
                    'type' => 'formulir usulan kenaikan pangkat jabatan ijazah',
                    'data' => 'Dokumen Anda gagal diverifikasi',
                ]);
            } elseif ($validated['status'] == 'Perbaikan') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_ijazahs_id' => $data_update->id,
                    'status' => 'Perbaikan',
                    'type' => 'formulir usulan kenaikan pangkat jabatan ijazah',
                    'data' => 'Dokumen Anda memerlukan perbaikan. Silakan periksa kembali dan lakukan revisi yang diperlukan.',
                ]);
            }

            return redirect('/proses-table-ijazah-verifikator')->with('success', 'Dokumen berhasil diverifikasi!');
        } else {
            return back()->with('error', 'Dokumen gagal diverifikasi');
        }
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $status = Status::all();
        $kecamatan = Kecamatan::all();

        $query = Form_ijazah::where('user_id', $user->id);

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('nip')) {
            $query->where('nip', $request->input('nip'));
        }

        $Form_ijazah = $query->latest()->paginate(5);

        return view('application.crud-form-ijazah.search-form', compact('Form_ijazah', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $form = Form_ijazah::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat penyesuaian ijazah')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-ijazah.edit-form', compact('form', 'user', 'notifications', 'unreadCount', 'periode', 'golongan'));
        } else {
            return view('application.error-page.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the existing record by its ID
        $dataUpload = Form_ijazah::findOrFail($id);

        // Update non-file fields
        $dataUpload->periode = $request->periode;
        $dataUpload->nama = $request->nama;
        $dataUpload->nip = $request->nip;
        $dataUpload->golongan = $request->golongan;
        $dataUpload->jabatan = $request->jabatan;
        $dataUpload->unit_kerja = $request->unit_kerja;
        $dataUpload->date = $request->date;
        $dataUpload->nomor_wa = $request->nomor_wa;
        $dataUpload->status = 'Pending';

        // Handle file uploads and update file fields
        $fileFields = [
            'doc_suratPengantar',
            'doc_pangkatTerakhir',
            'doc_jabatanAtasan',
            'doc_penilaian2022',
            'doc_penilaian2023',
            'doc_pakKonvensional',
            'doc_pakIntegrasi',
            'doc_pakKonversi',
            'doc_ujiKopetensi',
            'doc_izinBelajar',
            'doc_uraianTugaslama',
            'doc_uraianTugasbaru',
            'doc_suratTandakelulusan',
            'doc_ijazah',
            'doc_transkripNilai',
            'doc_sertifikatAkreditasi',
            'doc_pangkalanData',
            'doc_skAlihtugas',
            'doc_skJF'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($dataUpload->$field) {
                    $oldFile = public_path('assets/documentijazah/' . $dataUpload->$field);
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // Upload new file
                $upload = $request->file($field);
                $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                $upload->move(public_path('assets/documentijazah'), $nameFile);
                $dataUpload->$field = $nameFile;
            }
        }

        // Save the updated record
        $dataUpload->save();

        return redirect('/table-jabatan-ijazah')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = Form_ijazah::findOrFail($id);

        $form->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
