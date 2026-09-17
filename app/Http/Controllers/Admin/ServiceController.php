<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', ['services' => Service::withCount('cards')->orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service(['published' => true])]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $service = Service::create($data);
        $this->syncCards($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', ['service' => $service->load('cards')]);
    }

    public function update(Request $request, Service $service)
    {
        $service->update($this->validateData($request, $service->id));
        $this->syncCards($request, $service);

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('success', 'Service deleted.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'slug' => ['required', 'string', 'max:160', 'unique:services,slug'.($ignoreId ? ','.$ignoreId : '')],
            'badge' => ['nullable', 'string', 'max:255'],
            'title_line1' => ['required', 'string', 'max:255'],
            'title_line2' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string'],
            'list_title' => ['nullable', 'string', 'max:255'],
            'list_items' => ['nullable', 'string'],
            'stack_label' => ['nullable', 'string', 'max:255'],
            'stack_text' => ['nullable', 'string'],
            'hero_button_text' => ['nullable', 'string', 'max:255'],
            'overview_title' => ['nullable', 'string'],
            'overview_body1' => ['nullable', 'string'],
            'overview_body2' => ['nullable', 'string'],
            'cards_section_title' => ['nullable', 'string', 'max:255'],
            'cta_title1' => ['nullable', 'string', 'max:255'],
            'cta_title2' => ['nullable', 'string', 'max:255'],
            'cta_subtitle' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]) + ['published' => $request->boolean('published'), 'sort_order' => $request->integer('sort_order')];
    }

    private function syncCards(Request $request, Service $service): void
    {
        $service->cards()->delete();
        $titles = $request->input('card_title', []);
        $bodies = $request->input('card_body', []);
        $icons = $request->input('card_icon', []);

        foreach ($titles as $i => $title) {
            if (! trim((string) $title)) {
                continue;
            }
            $service->cards()->create([
                'title' => $title,
                'body' => $bodies[$i] ?? null,
                'icon' => $icons[$i] ?? 'code',
                'sort_order' => $i + 1,
            ]);
        }
    }
}
