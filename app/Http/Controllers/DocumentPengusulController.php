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

class DocumentPengusulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $Form_jabatan_fungsional = Form_jabatan_fungsional::all();
        $Form_regular = Form_regular::all();
        $Form_struktural = Form_struktural::all();
        $Form_ijazah = Form_ijazah::all();
        $status1 = Status::all();
        $status2 = Status::all();
        $status3 = Status::all();
        $status4 = Status::all();
        $kecamatan1 = Kecamatan::all();
        $kecamatan2 = Kecamatan::all();
        $kecamatan3 = Kecamatan::all();
        $kecamatan4 = Kecamatan::all();
        return view('super-admin.document-pengusul.table-pengusul',
        compact(
            'Form_jabatan_fungsional',
            'Form_regular',
            'Form_struktural',
            'Form_ijazah',
            'status1',
            'status2',
            'status3',
            'status4',
            'kecamatan1',
            'kecamatan2',
            'kecamatan3',
            'kecamatan4',
            'user'
        ));
    }

    public function searchadmin(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->where('read', false)->get();
        $unreadCount = $notifications->where('read', false)->count();
        $status = Status::all();
        $kecamatan = User::select('kecamatan')->distinct()->get();


        $searchType = $request->input('search_type');

        switch ($searchType) {
            case 'jabatan_fungsional':
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

        return view('super-admin.document-pengusul.search-form', compact('results', 'notifications', 'user', 'unreadCount', 'status', 'kecamatan', 'searchType'));
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
    public function showfungsional(string $id)
    {
        $user = Auth::user();
        $form = Form_jabatan_fungsional::find($id);
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        return view('super-admin.document-pengusul.detail-form-fungsional', ['form' => $form, 'user' =>$user, 'notifications'=>$notifications]);
    }

    public function showregular(string $id)
    {
        $user = Auth::user();
        $form = Form_regular::find($id);
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        return view('super-admin.document-pengusul.detail-form-regular', ['form' => $form, 'user' =>$user, 'notifications'=>$notifications]);
    }
    public function showstruktural(string $id)
    {
        $user = Auth::user();
        $form = Form_struktural::find($id);
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        return view('super-admin.document-pengusul.detail-form-struktural', ['form' => $form, 'user' =>$user, 'notifications'=>$notifications]);
    }
    public function showijazah(string $id)
    {
        $user = Auth::user();
        $form = Form_ijazah::find($id);
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        return view('super-admin.document-pengusul.detail-form-ijazah', ['form' => $form, 'user' =>$user, 'notifications'=>$notifications]);
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
