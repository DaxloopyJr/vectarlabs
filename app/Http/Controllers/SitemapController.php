<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Post;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Work;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => route('home'),       'priority' => '1.0', 'freq' => 'weekly'],
            ['loc' => route('about'),      'priority' => '0.8', 'freq' => 'monthly'],
            ['loc' => route('services'),   'priority' => '0.9', 'freq' => 'weekly'],
            ['loc' => route('industries'), 'priority' => '0.8', 'freq' => 'monthly'],
            ['loc' => route('works'),      'priority' => '0.8', 'freq' => 'weekly'],
            ['loc' => route('products'),   'priority' => '0.8', 'freq' => 'monthly'],
            ['loc' => route('insights'),   'priority' => '0.7', 'freq' => 'weekly'],
            ['loc' => route('team'),       'priority' => '0.6', 'freq' => 'monthly'],
            ['loc' => route('contact'),    'priority' => '0.9', 'freq' => 'yearly'],
        ];

        foreach (Service::published()->get() as $s) {
            $urls[] = ['loc' => route('services.show', $s->slug), 'lastmod' => $s->updated_at, 'priority' => '0.8', 'freq' => 'monthly'];
        }
        foreach (Industry::published()->get() as $i) {
            $urls[] = ['loc' => route('industries.show', $i->slug), 'lastmod' => $i->updated_at, 'priority' => '0.7', 'freq' => 'monthly'];
        }
        foreach (Work::published()->get() as $w) {
            $urls[] = ['loc' => route('works.show', $w->slug), 'lastmod' => $w->updated_at, 'priority' => '0.7', 'freq' => 'monthly'];
        }
        foreach (Post::published()->get() as $p) {
            $urls[] = ['loc' => route('insights.show', $p->id), 'lastmod' => $p->updated_at, 'priority' => '0.6', 'freq' => 'weekly'];
        }
        foreach (TeamMember::published()->get() as $m) {
            $urls[] = ['loc' => route('team.show', $m->slug), 'lastmod' => $m->updated_at, 'priority' => '0.5', 'freq' => 'monthly'];
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n"
            . "Allow: /\n"
            . "Disallow: /admin\n"
            . "Disallow: /admin/*\n"
            . "\nSitemap: " . route('sitemap') . "\n";

        return response($content)->header('Content-Type', 'text/plain');
    }
}
