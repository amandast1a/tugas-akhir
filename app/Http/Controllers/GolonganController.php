<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Golongan;
use Illuminate\Support\Facades\Auth;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $golongan = Golongan::all();
        return view('super-admin.crud-golongan.table-golongan' , compact('user', 'golongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('super-admin.crud-golongan.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'golongan' => 'required|string',
        ]);

        $dataUpload = new Golongan;
        $dataUpload->golongan = $request->golongan;

        if ($dataUpload->save()) {
            return redirect('/golongan')->with('success', 'Data baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $golongan = Golongan::findOrFail($id);
        $user = Auth::user();
        return view('super-admin.crud-golongan.edit', compact('golongan', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $golongan = Golongan::findOrFail($id);

        $golongan->update([
            'golongan' => $request->golongan,
        ]);

        $golongan->save();

        session()->flash('success', 'Data updated successfully!');

        return redirect('/golongan')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $golongan = Golongan::findOrFail($id);

        $golongan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
