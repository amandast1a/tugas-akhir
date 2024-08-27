<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form_jabatan_fungsional;
use App\Models\Form_regular;
use App\Models\Form_ijazah;
use App\Models\Form_struktural;
use App\Models\Golongan;
use App\Models\Periode;
use App\Models\Status;
use App\Models\Kecamatan;
use App\Models\Notification;
use App\Models\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FormJabatanFungsionalController extends Controller
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
        $form_jabatan_fungsional = Form_jabatan_fungsional::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.crud-form-jabatan.table-jabatan-fungsional', compact('form_jabatan_fungsional', 'status', 'user', 'notifications', 'unreadCount'));

    }

    public function indexverifikator()
    {
        $user = Auth::user();
        $Form_jabatan_fungsional = Form_jabatan_fungsional::with('user')->paginate(5);
        return view('verifikator.crud-form-jabatan.table-jabatan-fungsional', compact('Form_jabatan_fungsional', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat jabatan fungsional')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-jabatan.form-jabatan-fungsional', compact('user', 'notifications', 'unreadCount', 'periode', 'golongan'));
        } else {
            return view('application.error-page.error');
        }
    }

    public function proses()
    {
        $user = Auth::user();
        $status = Status::all(); // Fetch all statuses
        $formJabatanFungsional = Form_jabatan_fungsional::where('user_id', $user->id)->latest()->paginate(5);
        $notifications = Notification::where('user_id', $user->id)
                                    ->where('read', false)
                                    ->get();
        $unreadCount = $notifications->count();
        return view('application.proses.teble-jabatan-fungsional', compact('formJabatanFungsional', 'user', 'notifications', 'status', 'unreadCount'));
    }


    public function berhasil()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        $unreadCount = $notifications->where('read', false)->count();
        $Form_jabatan_fungsional = Form_jabatan_fungsional::where('user_id', $user->id)->get();
        $Form_jabatan_fungsional = Form_jabatan_fungsional::latest()->paginate(5);
        return view('application.crud-form-jabatan.table-berhasil-jabatan-fungsional', compact('Form_jabatan_fungsional', 'user', 'notifications', 'unreadCount'));
    }

    public function prosesverifikator()
    {
        $user = Auth::user();
        $status = Status::all();
        $kecamatan = Kecamatan::all();
        $Form_jabatan_fungsional = Form_jabatan_fungsional::with('user')->paginate(5);
        return view('verifikator.proses.teble-jabatan-fungsional', compact('Form_jabatan_fungsional', 'user', 'status', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataUpload = new Form_jabatan_fungsional;
        $dataUpload->user_id = Auth::id();
        $dataUpload->periode = $request->periode;
        $dataUpload->nama = $request->nama;
        $dataUpload->nip = $request->nip;
        $dataUpload->golongan = $request->golongan;
        $dataUpload->jabatan = $request->jabatan;
        $dataUpload->unit_kerja = $request->unit_kerja;
        $dataUpload->date = $request->date;
        $dataUpload->nomor_wa = $request->nomor_wa;

        // Handle each file upload individually
        if ($request->hasFile('doc_suratPengantar')) {
            $upload = $request->file('doc_suratPengantar');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_suratPengantar = $nameFile;
        }

        if ($request->hasFile('doc_skPangkat')) {
            $upload = $request->file('doc_skPangkat');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_skPangkat = $nameFile;
        }
        if ($request->hasFile('doc_pakKonvensional')) {
            $upload = $request->file('doc_pakKonvensional');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_pakKonvensional = $nameFile;
        }
        if ($request->hasFile('doc_pakIntegrasi')) {
            $upload = $request->file('doc_pakIntegrasi');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_pakIntegrasi = $nameFile;
        }
        if ($request->hasFile('doc_pakKonversi')) {
            $upload = $request->file('doc_pakKonversi');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_pakKonversi = $nameFile;
        }
        if ($request->hasFile('doc_penilaian2022')) {
            $upload = $request->file('doc_penilaian2022');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_penilaian2022 = $nameFile;
        }
        if ($request->hasFile('doc_penilaian2023')) {
            $upload = $request->file('doc_penilaian2023');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_penilaian2023 = $nameFile;
        }
        if ($request->hasFile('doc_jabatanAtasan')) {
            $upload = $request->file('doc_jabatanAtasan');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_jabatanAtasan = $nameFile;
        }
        if ($request->hasFile('doc_jabatanLama')) {
            $upload = $request->file('doc_jabatanLama');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_jabatanLama = $nameFile;
        }
        if ($request->hasFile('doc_jabatanTerakhir')) {
            $upload = $request->file('doc_jabatanTerakhir');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_jabatanTerakhir = $nameFile;
        }
        if ($request->hasFile('doc_pendidik')) {
            $upload = $request->file('doc_pendidik');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_pendidik = $nameFile;
        }
        if ($request->hasFile('doc_uji')) {
            $upload = $request->file('doc_uji');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentJabatans'), $nameFile);
            $dataUpload->doc_uji = $nameFile;
        }

        $dataUpload->save();

        return redirect('/proses-table-jabatan-fungsional')->with('success', 'Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $form = Form_jabatan_fungsional::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.crud-form-jabatan.detail-form', ['form' => $form, 'user' =>$user, 'notifications'=>$notifications, 'unreadCount'=>$unreadCount,]);
    }

    public function showverifikator($id)
    {
        $user = Auth::user();
        $form = Form_jabatan_fungsional::find($id);
        return view('verifikator.crud-form-jabatan.detail-form', ['form' => $form, 'user' =>$user]);
    }

    public function verifikasi($id)
    {
        $user = Auth::user();
        $status = Status::all();
        $form = Form_jabatan_fungsional::with('status')->find($id);
        return view('verifikator.crud-form-jabatan.verifikasi-form', [
            'form' => $form,
            'user' => $user,
            'status' => $status,
            // 'status' => $form->status,
        ]);
    }



    public function verifikasipost(Request $request, $id)
    {
        // Find the form to update
        $data_update = Form_jabatan_fungsional::findOrFail($id);

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
                    'form_fungsionals_id' => $data_update->id,
                    'status' => 'Pembuatan_SK_Berhasil',
                    'type' => 'formulir usulan kenaikan pangkat jabatan fungsional',
                    'data' => 'Dokumen Anda telah berhasil diverifikasi.',
                ]);
            } elseif ($validated['status'] == 'Ditolak') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_fungsionals_id' => $data_update->id,
                    'status' => 'Ditolak',
                    'type' => 'formulir usulan kenaikan pangkat jabatan fungsional',
                    'data' => 'Dokumen Anda gagal diverifikasi',
                ]);
            } elseif ($validated['status'] == 'Perbaikan') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_fungsionals_id' => $data_update->id,
                    'status' => 'Perbaikan',
                    'type' => 'formulir usulan kenaikan pangkat jabatan fungsional',
                    'data' => 'Dokumen Anda memerlukan perbaikan. Silakan periksa kembali dan lakukan revisi yang diperlukan.',
                ]);
            }
            return redirect('/proses-table-jabatan-fungsional-verifikator')->with('success', 'Dokumen berhasil diverifikasi!');
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

        $query = Form_jabatan_fungsional::where('user_id', $user->id);

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('nip')) {
            $query->where('nip', 'like', '%' . $request->input('nip') . '%');
        }

        $Form_fungsional = $query->latest()->paginate(5);

        return view('application.crud-form-jabatan.search-form', compact('Form_fungsional', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $form = Form_jabatan_fungsional::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat jabatan fungsional')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-jabatan.edit-form', compact('form', 'user', 'notifications', 'unreadCount', 'periode', 'golongan'));
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
        $dataUpload = Form_jabatan_fungsional::findOrFail($id);

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

        $fileFields = [
            'doc_suratPengantar',
            'doc_skPangkat',
            'doc_pakKonvensional',
            'doc_pakIntegrasi',
            'doc_pakKonversi',
            'doc_penilaian2022',
            'doc_penilaian2023',
            'doc_jabatanAtasan',
            'doc_jabatanLama',
            'doc_jabatanTerakhir',
            'doc_pendidik',
            'doc_uji'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete the old file if it exists
                if ($dataUpload->$field) {
                    $oldFilePath = public_path('assets/documentJabatans/' . $dataUpload->$field);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Upload the new file
                $upload = $request->file($field);
                $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                $upload->move(public_path('assets/documentJabatans'), $nameFile);
                $dataUpload->$field = $nameFile;
            }
        }

        // Save the updated data
        $dataUpload->save();

        return redirect('/proses-table-jabatan-fungsional')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $form = Form_jabatan_fungsional::findOrFail($id);

        // Define an array of file attributes
        $fileAttributes = [
            'doc_suratPengantar',
            'doc_skPangkat',
            'doc_pakKonvensional',
            'doc_pakIntegrasi',
            'doc_pakKonversi',
            'doc_penilaian2022',
            'doc_penilaian2023',
            'doc_jabatanAtasan',
            'doc_jabatanLama',
            'doc_jabatanTerakhir',
            'doc_pendidik',
            'doc_uji'
        ];

        // Loop through each attribute and delete the associated file if it exists
        foreach ($fileAttributes as $attribute) {
            if ($form->$attribute) {
                Storage::delete('public/assets/documentJabatans/' . $form->$attribute);
            }
        }

        // Delete the record from the database
        $form->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

}
