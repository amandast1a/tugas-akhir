<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $periode = Periode::all();
        return view('super-admin.crud-periode.table-periode', compact('user', 'periode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('super-admin.crud-periode.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required|string',
        ]);

        $dataUpload = new Periode;
        $dataUpload->periode = $request->periode;

        if ($dataUpload->save()) {
            return redirect('/periode')->with('success', 'Data baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Data gagal di tambahkan');
        }
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
        $periode = Periode::findOrFail($id);
        $user = Auth::user();
        return view('super-admin.crud-periode.edit', compact('periode', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $periode = Periode::findOrFail($id);

        $periode->update([
            'periode' => $request->periode,
        ]);

        $periode->save();

        session()->flash('success', 'Data updated successfully!');

        return redirect('/periode')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periode = Periode::findOrFail($id);

        $periode->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
