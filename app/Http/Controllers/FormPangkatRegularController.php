<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\Periode;
use App\Models\Status;
use App\Models\Form_regular;
use App\Models\Notification;
use App\Models\Kecamatan;
use App\Models\Pages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormPangkatRegularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $status = Status::all();
        $kecamatan = Kecamatan::all();
        $Form_regular = Form_regular::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.crud-form-regular.table-regular', compact('Form_regular', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan',));
    }

    public function indexverifikator()
    {
        $user = Auth::user();
        $Form_regular = Form_regular::where('user_id', $user->id)->latest()->paginate(5);
        return view('verifikator.crud-form-regular.table-regular', compact('user', 'Form_regular'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat regular')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-regular.form-regular', compact('user', 'notifications', 'unreadCount', 'periode', 'golongan'));
        } else {
            return view('application.error-page.error');
        }
    }

    public function proses()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $Form_regular = Form_regular::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.proses.teble-regular', compact('notifications', 'Form_regular', 'user', 'unreadCount'));
    }

    public function prosesverifikator()
    {
        $user = Auth::user();
        $status = Status::all();
        $kecamatan = Kecamatan::all();
        $Form_regular = Form_regular::with('user')->paginate(5);
        return view('verifikator.proses.teble-regular', compact('Form_regular', 'user', 'kecamatan', 'status',));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataUpload = new Form_regular;
        $dataUpload->user_id = Auth::id();
        $dataUpload->periode = $request->periode;
        $dataUpload->nama = $request->nama;
        $dataUpload->nip = $request->nip;
        $dataUpload->golongan = $request->golongan;
        $dataUpload->jabatan = $request->jabatan;
        $dataUpload->unit_kerja = $request->unit_kerja;
        $dataUpload->date = $request->date;
        $dataUpload->nomor_wa = $request->nomor_wa;

        if ($request->hasFile('doc_suratPengantar')) {
            $upload = $request->file('doc_suratPengantar');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_suratPengantar = $nameFile;
        }

        if ($request->hasFile('doc_pangkatTerakhir')) {
            $upload = $request->file('doc_pangkatTerakhir');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_pangkatTerakhir = $nameFile;
        }
        if ($request->hasFile('doc_jabatanAtasan')) {
            $upload = $request->file('doc_jabatanAtasan');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_jabatanAtasan = $nameFile;
        }
        if ($request->hasFile('doc_tandaLulus')) {
            $upload = $request->file('doc_tandaLulus');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_tandaLulus = $nameFile;
        }
        if ($request->hasFile('doc_skAlihtugas')) {
            $upload = $request->file('doc_skAlihtugas');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_skAlihtugas = $nameFile;
        }
        if ($request->hasFile('doc_penilaian2022')) {
            $upload = $request->file('doc_penilaian2022');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_penilaian2022 = $nameFile;
        }
        if ($request->hasFile('doc_penilaian2023')) {
            $upload = $request->file('doc_penilaian2023');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_penilaian2023 = $nameFile;
        }
        if ($request->hasFile('doc_skCpns')) {
            $upload = $request->file('doc_skCpns');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_skCpns = $nameFile;
        }
        if ($request->hasFile('doc_skPns')) {
            $upload = $request->file('doc_skPns');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_skPns = $nameFile;
        }
        if ($request->hasFile('doc_STTPL')) {
            $upload = $request->file('doc_STTPL');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_STTPL = $nameFile;
        }
        if ($request->hasFile('doc_beritaAcarasumpah')) {
            $upload = $request->file('doc_beritaAcarasumpah');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_beritaAcarasumpah = $nameFile;
        }
        if ($request->hasFile('doc_ijazah')) {
            $upload = $request->file('doc_ijazah');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_ijazah = $nameFile;
        }
        if ($request->hasFile('doc_transkrip')) {
            $upload = $request->file('doc_transkrip');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/documentRegular'), $nameFile);
            $dataUpload->doc_transkrip = $nameFile;
        }

        $dataUpload->save();

        return redirect('/table-regular')->with('success', 'Data baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $form = Form_regular::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.crud-form-regular.detail-form', compact('form', 'notifications', 'user', 'unreadCount'));
    }

    public function showverifikator($id)
    {
        $user = Auth::user();
        $form = Form_regular::find($id);
        return view('verifikator.crud-form-regular.detail-form', ['form' => $form, 'user' =>$user]);
    }

    public function verifikasi($id)
    {
        $user = Auth::user();
        $status = Status::all();
        $form = Form_regular::find($id);
        return view('verifikator.crud-form-regular.verifikasi-form', ['form' => $form, 'user' =>$user, 'status' =>$status,]);
    }

    public function verifikasipost(Request $request, $id)
    {
        $data_update = Form_regular::findOrFail($id);

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
                    'form_regulars_id' => $data_update->id,
                    'status' => 'Pembuatan_SK_Berhasil',
                    'type' => 'formulir usulan kenaikan pangkat jabatan regular',
                    'data' => 'Dokumen Anda telah berhasil diverifikasi.',
                ]);
            } elseif ($validated['status'] == 'Ditolak') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_regulars_id' => $data_update->id,
                    'status' => 'Ditolak',
                    'type' => 'formulir usulan kenaikan pangkat jabatan regular',
                    'data' => 'Dokumen Anda gagal diverifikasi',
                ]);
            } elseif ($validated['status'] == 'Perbaikan') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_regulars_id' => $data_update->id,
                    'status' => 'Perbaikan',
                    'type' => 'formulir usulan kenaikan pangkat jabatan regular',
                    'data' => 'Dokumen Anda memerlukan perbaikan. Silakan periksa kembali dan lakukan revisi yang diperlukan.',
                ]);
            }

            return redirect('/proses-table-regular-verifikator')->with('success', 'Dokumen berhasil diverifikasi!');
        } else {
            Log::error('Failed to update document');
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

        $query = Form_regular::where('user_id', $user->id);

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('nip')) {
            $query->where('nip', 'like', '%' . $request->input('nip') . '%');
        }

        $Form_regular = $query->latest()->paginate(5);

        return view('application.crud-form-regular.search-form', compact('Form_regular', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan'));
    }

    public function searchverifikator (Request $request)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $form = Form_regular::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();

        $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat regular')
                           ->where('level', $user->level)
                           ->where('is_active', true)
                           ->first();

        if ($activePage) {
            $golongan = Golongan::all();
            $periode = Periode::all();
            return view('application.crud-form-regular.edit-form', compact('form', 'user', 'notifications', 'unreadCount', 'periode', 'golongan'));
        } else {
            return view('application.error-page.error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the existing record by its ID
        $dataUpload = Form_regular::findOrFail($id);

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
            'doc_suratPengantar', 'doc_pangkatTerakhir', 'doc_jabatanAtasan',
            'doc_tandaLulus', 'doc_skAlihtugas', 'doc_penilaian2022',
            'doc_penilaian2023', 'doc_skCpns', 'doc_skPns', 'doc_STTPL',
            'doc_beritaAcarasumpah', 'doc_ijazah', 'doc_transkrip'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($dataUpload->$field) {
                    $oldFile = public_path('assets/documentRegular/' . $dataUpload->$field);
                    if (file_exists($oldFile)) {
                        unlink($oldFile);
                    }
                }

                // Upload new file
                $upload = $request->file($field);
                $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                $upload->move(public_path('assets/documentRegular'), $nameFile);
                $dataUpload->$field = $nameFile;
            }
        }

        // Save the updated record
        $dataUpload->save();

        return redirect('/table-regular')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form = Form_regular::findOrFail($id);

        $form->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
