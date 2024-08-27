<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dinas;
use Illuminate\Support\Facades\Auth;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $dinas = Dinas::all();
        return view('super-admin.crud-dinas.table-dinas', compact('user', 'dinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('super-admin.crud-dinas.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dinas' => 'required|string',
        ]);

        $dataUpload = new Dinas;
        $dataUpload->dinas = $request->dinas;

        if ($dataUpload->save()) {
            return redirect('/dinas')->with('success', 'Data baru berhasil ditambahkan!');
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
        $dinas = Dinas::findOrFail($id);
        $user = Auth::user();
        return view('super-admin.crud-dinas.edit', compact('dinas', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dinas = Dinas::findOrFail($id);

        $dinas->update([
            'dinas' => $request->dinas,
        ]);

        $dinas->save();

        session()->flash('success', 'Data updated successfully!');

        return redirect('/dinas')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dinas = Dinas::findOrFail($id);

        $dinas->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
