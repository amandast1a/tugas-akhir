<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\Form_jabatan_fungsional;
use App\Models\Form_regular;
use App\Models\Form_struktural;
use App\Models\Form_ijazah;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->count();

        $Form_jabatan_fungsional = Form_jabatan_fungsional::latest('updated_at')->first();
        $jumlahpengusul = Form_jabatan_fungsional::count();
        $pendingstatus = Form_jabatan_fungsional::where('status', 'Pending')->count();
        $berhasilstatus = Form_jabatan_fungsional::where('status', 'Berhasil')->count();
        $gagalstatus = Form_jabatan_fungsional::where('status', 'Ditolak')->count();
        $perbaikanstatus = Form_jabatan_fungsional::where('status', 'Perbaikan')->count();

        $Form_regular = Form_regular::latest('updated_at')->first();
        $jumlahpengusulregular = Form_regular::count();
        $pendingstatusregular = Form_regular::where('status', 'Pending')->count();
        $berhasilstatusregular = Form_regular::where('status', 'Berhasil')->count();
        $gagalstatusregular = Form_regular::where('status', 'Ditolak')->count();
        $perbaikanstatusregular = Form_regular::where('status', 'Perbaikan')->count();

        $Form_struktural = Form_struktural::latest('updated_at')->first();
        $jumlahpengusulstruktural = Form_struktural::count();
        $pendingstatusstruktural = Form_struktural::where('status', 'Pending')->count();
        $berhasilstatusstruktural = Form_struktural::where('status', 'Berhasil')->count();
        $gagalstatusstruktural = Form_struktural::where('status', 'Ditolak')->count();
        $perbaikanstatusstruktural = Form_struktural::where('status', 'Perbaikan')->count();

        $Form_ijazah = Form_ijazah::latest('updated_at')->first();
        $jumlahpengusulijazah = Form_ijazah::count();
        $pendingstatusijazah = Form_ijazah::where('status', 'Pending')->count();
        $berhasilstatusijazah = Form_ijazah::where('status', 'Berhasil')->count();
        $gagalstatusijazah = Form_ijazah::where('status', 'Ditolak')->count();
        $perbaikanstatusijazah = Form_ijazah::where('status', 'Perbaikan')->count();
        return view('application.dashboard',
        compact(
            'user',
            'notifications',
            'unreadCount',
            'Form_jabatan_fungsional',
            'jumlahpengusul',
            'pendingstatus',
            'berhasilstatus',
            'gagalstatus',
            'perbaikanstatus',

            'Form_regular',
            'jumlahpengusulregular',
            'pendingstatusregular',
            'berhasilstatusregular',
            'gagalstatusregular',
            'perbaikanstatusregular',

            'Form_struktural',
            'jumlahpengusulstruktural',
            'pendingstatusstruktural',
            'berhasilstatusstruktural',
            'gagalstatusstruktural',
            'perbaikanstatusstruktural',

            'Form_ijazah',
            'jumlahpengusulijazah',
            'pendingstatusijazah',
            'berhasilstatusijazah',
            'gagalstatusijazah',
            'perbaikanstatusijazah',
        ));
    }

    public function superadmin()
    {
        $user = Auth::user();

        $Form_jabatan_fungsional = Form_jabatan_fungsional::latest('updated_at')->first();
        $jumlahpengusul = Form_jabatan_fungsional::count();
        $pendingstatus = Form_jabatan_fungsional::where('status', 'Pending')->count();
        $berhasilstatus = Form_jabatan_fungsional::where('status', 'Berhasil')->count();
        $gagalstatus = Form_jabatan_fungsional::where('status', 'Ditolak')->count();
        $perbaikanstatus = Form_jabatan_fungsional::where('status', 'Perbaikan')->count();

        $Form_regular = Form_regular::latest('updated_at')->first();
        $jumlahpengusulregular = Form_regular::count();
        $pendingstatusregular = Form_regular::where('status', 'Pending')->count();
        $berhasilstatusregular = Form_regular::where('status', 'Berhasil')->count();
        $gagalstatusregular = Form_regular::where('status', 'Ditolak')->count();
        $perbaikanstatusregular = Form_regular::where('status', 'Perbaikan')->count();

        $Form_struktural = Form_struktural::latest('updated_at')->first();
        $jumlahpengusulstruktural = Form_struktural::count();
        $pendingstatusstruktural = Form_struktural::where('status', 'Pending')->count();
        $berhasilstatusstruktural = Form_struktural::where('status', 'Berhasil')->count();
        $gagalstatusstruktural = Form_struktural::where('status', 'Ditolak')->count();
        $perbaikanstatusstruktural = Form_struktural::where('status', 'Perbaikan')->count();

        $Form_ijazah = Form_ijazah::latest('updated_at')->first();
        $jumlahpengusulijazah = Form_ijazah::count();
        $pendingstatusijazah = Form_ijazah::where('status', 'Pending')->count();
        $berhasilstatusijazah = Form_ijazah::where('status', 'Berhasil')->count();
        $gagalstatusijazah = Form_ijazah::where('status', 'Ditolak')->count();
        $perbaikanstatusijazah = Form_ijazah::where('status', 'Perbaikan')->count();
        return view('super-admin.dashboard',
        compact(
            'user',

            'Form_jabatan_fungsional',
            'jumlahpengusul',
            'pendingstatus',
            'berhasilstatus',
            'gagalstatus',
            'perbaikanstatus',

            'Form_regular',
            'jumlahpengusulregular',
            'pendingstatusregular',
            'berhasilstatusregular',
            'gagalstatusregular',
            'perbaikanstatusregular',

            'Form_struktural',
            'jumlahpengusulstruktural',
            'pendingstatusstruktural',
            'berhasilstatusstruktural',
            'gagalstatusstruktural',
            'perbaikanstatusstruktural',

            'Form_ijazah',
            'jumlahpengusulijazah',
            'pendingstatusijazah',
            'berhasilstatusijazah',
            'gagalstatusijazah',
            'perbaikanstatusijazah',
        ));
    }

    public function verifikator()
    {
        $user = Auth::user();

        $Form_jabatan_fungsional = Form_jabatan_fungsional::latest('updated_at')->first();
        $jumlahpengusul = Form_jabatan_fungsional::count();
        $pendingstatus = Form_jabatan_fungsional::where('status', 'Pending')->count();
        $berhasilstatus = Form_jabatan_fungsional::where('status', 'Berhasil')->count();
        $gagalstatus = Form_jabatan_fungsional::where('status', 'Ditolak')->count();
        $perbaikanstatus = Form_jabatan_fungsional::where('status', 'Perbaikan')->count();

        $Form_regular = Form_regular::latest('updated_at')->first();
        $jumlahpengusulregular = Form_regular::count();
        $pendingstatusregular = Form_regular::where('status', 'Pending')->count();
        $berhasilstatusregular = Form_regular::where('status', 'Berhasil')->count();
        $gagalstatusregular = Form_regular::where('status', 'Ditolak')->count();
        $perbaikanstatusregular = Form_regular::where('status', 'Perbaikan')->count();

        $Form_struktural = Form_struktural::latest('updated_at')->first();
        $jumlahpengusulstruktural = Form_struktural::count();
        $pendingstatusstruktural = Form_struktural::where('status', 'Pending')->count();
        $berhasilstatusstruktural = Form_struktural::where('status', 'Berhasil')->count();
        $gagalstatusstruktural = Form_struktural::where('status', 'Ditolak')->count();
        $perbaikanstatusstruktural = Form_struktural::where('status', 'Perbaikan')->count();

        $Form_ijazah = Form_ijazah::latest('updated_at')->first();
        $jumlahpengusulijazah = Form_ijazah::count();
        $pendingstatusijazah = Form_ijazah::where('status', 'Pending')->count();
        $berhasilstatusijazah = Form_ijazah::where('status', 'Berhasil')->count();
        $gagalstatusijazah = Form_ijazah::where('status', 'Ditolak')->count();
        $perbaikanstatusijazah = Form_ijazah::where('status', 'Perbaikan')->count();
        return view('verifikator.dashboard',
        compact(
            'user',

            'Form_jabatan_fungsional',
            'jumlahpengusul',
            'pendingstatus',
            'berhasilstatus',
            'gagalstatus',
            'perbaikanstatus',

            'Form_regular',
            'jumlahpengusulregular',
            'pendingstatusregular',
            'berhasilstatusregular',
            'gagalstatusregular',
            'perbaikanstatusregular',

            'Form_struktural',
            'jumlahpengusulstruktural',
            'pendingstatusstruktural',
            'berhasilstatusstruktural',
            'gagalstatusstruktural',
            'perbaikanstatusstruktural',

            'Form_ijazah',
            'jumlahpengusulijazah',
            'pendingstatusijazah',
            'berhasilstatusijazah',
            'gagalstatusijazah',
            'perbaikanstatusijazah',
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
