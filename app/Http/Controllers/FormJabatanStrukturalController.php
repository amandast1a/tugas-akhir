<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form_struktural;
use App\Models\Notification;
use App\Models\Golongan;
use App\Models\Status;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Log;
use App\Models\Periode;
use App\Models\Pages;
use Illuminate\Support\Facades\Validator;

class FormJabatanStrukturalController extends Controller
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
        $Form_struktural = Form_struktural::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.crud-form-struktural.table-jabatan-struktural', compact('Form_struktural', 'status', 'user', 'notifications', 'unreadCount'));
    }

    public function indexverifikator()
    {
        $user = Auth::user();
        return view('verifikator.crud-form-struktural.table-jabatan-struktural', compact('user'));
    }

    public function proses()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $Form_struktural = Form_struktural::where('user_id', $user->id)->latest()->paginate(5);
        return view('application.proses.teble-struktural', compact('notifications', 'Form_struktural', 'user', 'unreadCount'));
    }

    public function prosesverifikator()
    {
        $user = Auth::user();
        $status = Status::all();
        $kecamatan = Kecamatan::all();
        $Form_struktural = Form_struktural::with('user')->paginate(5);
        return view('verifikator.proses.teble-struktural', compact('Form_struktural', 'user', 'status', 'kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
            {
                $user = Auth::user();
                $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
                $unreadCount = $notifications->where('read', false)->count();

                $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat struktural')
                                ->where('level', $user->level)
                                ->where('is_active', true)
                                ->first();

                if ($activePage) {
                    $golongan = Golongan::all();
                    $periode = Periode::all();
                    return view('application.crud-form-struktural.form-jabatan-struktural', compact('user', 'notifications', 'unreadCount', 'periode', 'golongan'));
                } else {
                    return view('application.error-page.error');
                }
            }

            /**
             * Store a newly created resource in storage.
             */

    public function store(Request $request)
    {
        try {
            $request->valiate([
                'nama' => 'required|string',
                'nip' => 'required|integer',
                'jabatan' => 'required|string',
                'unit_kerja' => 'required|string',
                'nomor_wa' => 'required|string',
                'doc_suratPengantar' => 'required|mimes:pdf|max:1024',
                'doc_pangkatTerakhir' => 'required|mimes:pdf|max:1024',
                'doc_jabatanAtasan' => 'required|mimes:pdf|max:1024',
                'doc_penilaian2022' => 'required|mimes:pdf|max:1024',
                'doc_penilaian2023' => 'required|mimes:pdf|max:1024',
                'doc_jabatanLama' => 'required|mimes:pdf|max:1024',
                'doc_jabatanBaru' => 'required|mimes:pdf|max:1024',
                'doc_beritaAcarasumpahlama' => 'required|mimes:pdf|max:1024',
                'doc_beritaAcarasumpahbaru' => 'required|mimes:pdf|max:1024',
                'doc_pernyataanPelantikanlama' => 'required|mimes:pdf|max:1024',
                'doc_pernyataanPelantikanlama' => 'required|mimes:pdf|max:1024',
                'doc_riwayatAtasan' => 'required|mimes:pdf|max:1024',
                'doc_ujianDinas' => 'required|mimes:pdf|max:1024',
                'doc_skAlihtugas' => 'required|mimes:pdf|max:1024',
            ]);

                $dataUpload = new Form_struktural;
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
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_suratPengantar = $nameFile;
                }

                if ($request->hasFile('doc_pangkatTerakhir')) {
                    $upload = $request->file('doc_pangkatTerakhir');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_pangkatTerakhir = $nameFile;
                }

                if ($request->hasFile('doc_jabatanAtasan')) {
                    $upload = $request->file('doc_jabatanAtasan');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_jabatanAtasan = $nameFile;
                }

                if ($request->hasFile('doc_penilaian2022')) {
                    $upload = $request->file('doc_penilaian2022');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_penilaian2022 = $nameFile;
                }

                if ($request->hasFile('doc_penilaian2023')) {
                    $upload = $request->file('doc_penilaian2023');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_penilaian2023 = $nameFile;
                }

                if ($request->hasFile('doc_jabatanLama')) {
                    $upload = $request->file('doc_jabatanLama');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_jabatanLama = $nameFile;
                }

                if ($request->hasFile('doc_jabatanBaru')) {
                    $upload = $request->file('doc_jabatanBaru');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_jabatanBaru = $nameFile;
                }

                if ($request->hasFile('doc_beritaAcarasumpahlama')) {
                    $upload = $request->file('doc_beritaAcarasumpahlama');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_beritaAcarasumpahlama = $nameFile;
                }

                if ($request->hasFile('doc_beritaAcarasumpahbaru')) {
                    $upload = $request->file('doc_beritaAcarasumpahbaru');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_beritaAcarasumpahbaru = $nameFile;
                }

                if ($request->hasFile('doc_pernyataanPelantikanlama')) {
                    $upload = $request->file('doc_pernyataanPelantikanlama');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_pernyataanPelantikanlama = $nameFile;
                }

                if ($request->hasFile('doc_pernyataanPelantikanbaru')) {
                    $upload = $request->file('doc_pernyataanPelantikanbaru');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_pernyataanPelantikanbaru = $nameFile;
                }

                if ($request->hasFile('doc_riwayatAtasan')) {
                    $upload = $request->file('doc_riwayatAtasan');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_riwayatAtasan = $nameFile;
                }

                if ($request->hasFile('doc_ujianDinas')) {
                    $upload = $request->file('doc_ujianDinas');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_ujianDinas = $nameFile;
                }

                if ($request->hasFile('doc_skAlihtugas')) {
                    $upload = $request->file('doc_skAlihtugas');
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->doc_skAlihtugas = $nameFile;
                }

                $dataUpload->save();

                return redirect('/table-jabatan-struktural')->with('success', 'Data baru berhasil ditambahkan!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Silahkan melengkapi data anda');
                }
        }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $form = Form_struktural::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.crud-form-struktural.detail-form', compact('form', 'notifications', 'user', 'unreadCount'));
    }

    public function showverifikator($id)
    {
        $user = Auth::user();
        $form = Form_struktural::find($id);
        return view('verifikator.crud-form-struktural.detail-form', ['form' => $form, 'user' =>$user]);
    }

    public function verifikasi($id)
    {
        $user = Auth::user();
        $status = Status::all();
        $form = Form_struktural::find($id);
        return view('verifikator.crud-form-struktural.verifikasi-form', ['form' => $form, 'user' =>$user, 'status' =>$status,]);
    }

    public function verifikasipost(Request $request, $id)
    {
        $data_update = Form_struktural::findOrFail($id);

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
            if ($validated['status'] == 'Berhasil') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_strukturals_id' => $data_update->id,
                    'status' => 'Berhasil',
                    'type' => 'formulir usulan kenaikan pangkat jabatan struktural',
                    'data' => 'Dokumen Anda telah berhasil diverifikasi.',
                ]);
            } elseif ($validated['status'] == 'Ditolak') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_strukturals_id' => $data_update->id,
                    'status' => 'Ditolak',
                    'type' => 'formulir usulan kenaikan pangkat jabatan struktural',
                    'data' => 'Dokumen Anda gagal diverifikasi',
                ]);
            } elseif ($validated['status'] == 'Perbaikan') {
                Notification::create([
                    'user_id' => $data_update->user_id,
                    'form_strukturals_id' => $data_update->id,
                    'status' => 'Perbaikan',
                    'type' => 'formulir usulan kenaikan pangkat jabatan struktural',
                    'data' => 'Dokumen Anda memerlukan perbaikan. Silakan periksa kembali dan lakukan revisi yang diperlukan.',
                ]);
            }

            return redirect('/proses-table-struktural-verifikator')->with('success', 'Dokumen berhasil diverifikasi!');
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

        $query = Form_struktural::where('user_id', $user->id);

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('nip')) {
            $query->where('nip', 'like', '%' . $request->input('nip') . '%');
        }

        $Form_struktural = $query->latest()->paginate(5);

        return view('application.crud-form-struktural.search-form', compact('Form_struktural', 'notifications', 'user', 'unreadCount', 'status',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $form = Form_struktural::find($id);
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
            $unreadCount = $notifications->where('read', false)->count();

            $activePage = Pages::where('type', 'formulir usulan kenaikan pangkat struktural')
                            ->where('level', $user->level)
                            ->where('is_active', true)
                            ->first();

            if ($activePage) {
                $golongan = Golongan::all();
                $periode = Periode::all();
                return view('application.crud-form-struktural.edit-form', compact('form', 'user', 'notifications', 'unreadCount', 'periode', 'golongan'));
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
            $dataUpload = Form_struktural::findOrFail($id);

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
            $files = [
                'doc_suratPengantar' => 'doc_suratPengantar',
                'doc_pangkatTerakhir' => 'doc_pangkatTerakhir',
                'doc_jabatanAtasan' => 'doc_jabatanAtasan',
                'doc_penilaian2022' => 'doc_penilaian2022',
                'doc_penilaian2023' => 'doc_penilaian2023',
                'doc_jabatanLama' => 'doc_jabatanLama',
                'doc_jabatanBaru' => 'doc_jabatanBaru',
                'doc_beritaAcarasumpahlama' => 'doc_beritaAcarasumpahlama',
                'doc_beritaAcarasumpahbaru' => 'doc_beritaAcarasumpahbaru',
                'doc_pernyataanPelantikanlama' => 'doc_pernyataanPelantikanlama',
                'doc_pernyataanPelantikanbaru' => 'doc_pernyataanPelantikanbaru',
                'doc_riwayatAtasan' => 'doc_riwayatAtasan',
                'doc_ujianDinas' => 'doc_ujianDinas',
                'doc_skAlihtugas' => 'doc_skAlihtugas',
            ];

            foreach ($files as $inputName => $columnName) {
                if ($request->hasFile($inputName)) {
                    $upload = $request->file($inputName);
                    $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
                    $upload->move(public_path('assets/documentStruktural'), $nameFile);
                    $dataUpload->$columnName = $nameFile;
                }
            }

            // Save the updated record
            $dataUpload->save();

            return redirect('/table-jabtan-struktural')->with('success', 'Data berhasil diperbarui!');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $form = Form_struktural::findOrFail($id);

            $form->delete();

            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }
    }
