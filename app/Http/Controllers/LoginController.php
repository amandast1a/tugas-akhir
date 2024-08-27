<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only('nip', 'password'))) {
            $user = Auth::user();

            switch ($user->level) {
                case 'superadmin':
                    return redirect('dashboard-super-admin');
                case 'verifikator':
                    return redirect('dashboard-verifikator');
                case 'pengusul':
                    return redirect('dashboard-pengusul');
                default:
                    return redirect('/'); // Redirect to home or a default page
            }
        }
        return back()->with('failed', 'NIP atau kata sandi anda salah');
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
    public function logout()
    {
        Auth::logout();

        if (request()->session()) {
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        return redirect('/')->with('logoutsuccess', 'Anda berhasil keluar');
    }
}
