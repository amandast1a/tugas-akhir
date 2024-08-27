<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pengusul()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.profile', compact('user', 'notifications', 'unreadCount'));
    }

    public function superadmin()
    {
        $user = Auth::user();
        return view('super-admin.profile.profile', compact('user'));
    }

    public function verifikator()
    {
        $user = Auth::user();
        return view('verifikator.profile.profile', compact('user'));
    }

    public function storeSuperadmin(Request $request)
    {
        $dataUpload = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('photo')) {
            $upload = $request->file('photo');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/photoprofile'), $nameFile);
            $dataUpload->photo = $nameFile;
        }
        $dataUpload->save();

        return redirect()->back();
    }
    public function storePengusul(Request $request)
    {
        $dataUpload = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('photo')) {
            $upload = $request->file('photo');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/photoprofile'), $nameFile);
            $dataUpload->photo = $nameFile;
        }
        $dataUpload->save();

        return redirect()->back();
    }
    public function storeVerifikator(Request $request)
    {
        $dataUpload = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('photo')) {
            $upload = $request->file('photo');
            $nameFile = time() . rand(100, 999) . "." . $upload->getClientOriginalExtension();
            $upload->move(public_path('assets/photoprofile'), $nameFile);
            $dataUpload->photo = $nameFile;
        }
        $dataUpload->save();

        return redirect()->back();
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
