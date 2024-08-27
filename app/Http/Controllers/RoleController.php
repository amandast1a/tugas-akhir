<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Dinas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $superadmin = User::where('level', 'superadmin')->count();
        $pengusul = User::where('level', 'pengusul')->count();
        $verifikator = User::where('level', 'verifikator')->count();
        return view('super-admin.crud-role.role',
        compact(
            'user',
            'users',
            'superadmin',
            'pengusul',
            'verifikator',
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $dinas = Dinas::all();
        return view('super-admin.crud-role.edit-user', compact('user', 'dinas', 'kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Update user data
        $user->nama = $request->nama;
        $user->level = $request->level;
        $user->kecamatan = $request->kecamatan;
        $user->dinas = $request->dinas;
        $user->jabatan = $request->jabatan;
        $user->nip = $request->nip;
        $user->tanggal_lahir = $request->tanggal_lahir;

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('role.table')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
