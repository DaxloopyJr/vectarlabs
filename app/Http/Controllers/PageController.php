<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'services' => Service::published()->get(),
            'posts' => Post::published()->take(3)->get(),
        ]);
    }

    public function about()
    {
        return view('about', [
            'posts' => Post::published()->skip(3)->take(2)->get(),
        ]);
    }

    public function services()
    {
        return view('services.index', ['services' => Service::published()->get()]);
    }

    public function service(string $slug)
    {
        $service = Service::published()->where('slug', $slug)->with('cards')->firstOrFail();

        return view('services.show', compact('service'));
    }

    public function team()
    {
        return view('team', ['members' => TeamMember::published()->get()]);
    }

    public function contact()
    {
        return view('contact');
    }
}
