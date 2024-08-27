<?php

namespace App\Http\Controllers;

use App\Models\Form_ijazah;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Form_jabatan_fungsional;
use App\Models\Form_regular;
use App\Models\Form_struktural;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
                                    ->with('formFungsional', 'formRegular', 'formStruktural', 'formIjazah')
                                    ->latest()
                                    ->get();
        $unreadCount = $notifications->where('read', false)->count();

        return view('application.notif.index', compact('notifications', 'user', 'unreadCount'));
    }

    public function detail($id)
    {
        $user = Auth::user();

        // Find the notification by ID and ensure it belongs to the authenticated user
        $notification = Notification::where('id', $id)
                                    ->where('user_id', $user->id)
                                    ->with('formFungsional', 'formRegular', 'formStruktural', 'formIjazah')
                                    ->firstOrFail();

        // Mark the notification as read if it's not already read
        if (!$notification->read) {
            $notification->read = true;
            $notification->save();
        }

        // Fetch all notifications for the user, same as in the index method
        $notifications = Notification::where('user_id', $user->id)
                                    ->with('formFungsional', 'formRegular', 'formStruktural', 'formIjazah')
                                    ->latest()
                                    ->get();

        // Count unread notifications
        $unreadCount = $notifications->where('read', false)->count();

        // Pass the notification and related data to the detail view
        return view('application.notif.detail', compact('notifications', 'user', 'unreadCount', 'notification'));
    }


    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if ($notification->user_id == Auth::id()) {
            $notification->read = true;
            $notification->save();
        }

        return redirect()->back()->with('success', 'Notifikasi ditandai sebagai sudah dibaca.');
    }

    public function archive($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus.');
    }

    public function markAllAsRead(Request $request)
    {
        $user = Auth::user();

        Notification::where('user_id', $user->id)->update(['read' => true]);

        return back()->with('success', 'Semua notifikasi telah dibaca!');
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
