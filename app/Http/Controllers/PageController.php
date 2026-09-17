<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Work;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'services' => Service::published()->get(),
            'industries' => Industry::published()->take(4)->get(),
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

    public function industries()
    {
        return view('industries.index', ['industries' => Industry::published()->get()]);
    }

    public function industry(string $slug)
    {
        $industry = Industry::published()->where('slug', $slug)->firstOrFail();

        return view('industries.show', compact('industry'));
    }

    public function works()
    {
        return view('works.index', ['works' => Work::published()->get()]);
    }

    public function work(string $slug)
    {
        $work = Work::published()->where('slug', $slug)->firstOrFail();
        $moreWorks = Work::published()->where('id', '!=', $work->id)->take(3)->get();

        return view('works.show', compact('work', 'moreWorks'));
    }

    public function products()
    {
        return view('products.index', ['products' => Product::published()->get()]);
    }

    public function insights()
    {
        return view('insights.index', ['posts' => Post::published()->latest()->get()]);
    }

    public function insight(int $id)
    {
        $post = Post::published()->findOrFail($id);
        $morePosts = Post::published()->where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('insights.show', compact('post', 'morePosts'));
    }

    public function team()
    {
        return view('team', ['members' => TeamMember::published()->get()]);
    }

    public function teamMember(string $slug)
    {
        $member = TeamMember::published()->where('slug', $slug)->firstOrFail();

        return view('team.show', compact('member'));
    }

    public function contact()
    {
        return view('contact');
    }
}
