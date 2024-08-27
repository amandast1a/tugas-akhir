<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Dinas;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $kecamatan = Kecamatan::all();
        $dinas = Dinas::all();
        return view('super-admin.crud-role.form-user', compact('kecamatan', 'dinas', 'user'));
    }

    public function register(Request $request)
    {

            $data['nama'] = $request->nama;
            $data['level'] = $request->level;
            $data['kecamatan'] = $request->kecamatan;
            $data['dinas'] = $request->dinas;
            $data['jabatan'] = $request->jabatan;
            $data['nip'] = $request->nip;
            $data['tanggal_lahir'] = $request->tanggal_lahir;
            $data['password'] = Hash::make($request->password);

        user::create($data);

        return redirect()->route('role.table')->with('success', 'Registration successful. Please login.');
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
