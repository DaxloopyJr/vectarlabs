<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'services' => Service::count(),
            'team' => TeamMember::count(),
            'posts' => Post::count(),
            'unread' => ContactMessage::where('read', false)->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
