<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class RulesController extends Controller
{
    public function viewrules()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->latest()->get();
        $unreadCount = $notifications->where('read', false)->count();
        return view('application.rules', compact('user', 'notifications', 'unreadCount'));
    }
}
