<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        return view('admin.industries.index', ['industries' => Industry::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.industries.form', ['industry' => new Industry(['published' => true, 'icon' => 'briefcase'])]);
    }

    public function store(Request $request)
    {
        Industry::create($this->validateData($request));

        return redirect()->route('admin.industries.index')->with('success', 'Industry added.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.form', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $industry->update($this->validateData($request));

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return back()->with('success', 'Industry removed.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:160'],
            'icon' => ['nullable', 'string', 'max:60'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'offerings' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]);

        $data['slug'] = Str::slug($data['slug'] ?: $data['name']);
        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $request->integer('sort_order');

        return $data;
    }
}
