<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form_jabatan_fungsional;
use App\Models\Form_regular;
use App\Models\Form_struktural;
use App\Models\Form_ijazah;
use App\Models\User;
use App\Models\Status;
use App\Models\Kecamatan;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function searchverifikator(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $status = Status::all();
        $kecamatan = User::select('kecamatan')->distinct()->get();


        $searchType = $request->input('search_type');

        switch ($searchType) {
            case 'fungsional':
                $query = Form_jabatan_fungsional::with('user');
                break;
            case 'regular':
                $query = Form_regular::with('user');
                break;
            case 'ijazah':
                $query = Form_ijazah::with('user');
                break;
            case 'struktural':
                $query = Form_struktural::with('user');
                break;
            default:
                // Handle invalid search type
                $query = Form_jabatan_fungsional::with('user'); // Default query or handle accordingly
                break;
        }

        if ($request->has('nama')) {
            $query->where('nama', 'like', '%' . $request->input('nama') . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('kecamatan')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('kecamatan', $request->input('kecamatan'));
            });
        }

        $results = $query->latest()->paginate(5, ['*'], $searchType . '_page');

        return view('verifikator.search.search', compact('results', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan', 'searchType'));
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
