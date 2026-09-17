<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Industry;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Work;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'services' => Service::count(),
            'industries' => Industry::count(),
            'products' => Product::count(),
            'works' => Work::count(),
            'team' => TeamMember::count(),
            'posts' => Post::count(),
            'unread' => ContactMessage::where('read', false)->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
