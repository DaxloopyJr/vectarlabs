<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    public function index()
    {
        return view('admin.works.index', ['works' => Work::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.works.form', ['work' => new Work(['published' => true])]);
    }

    public function store(Request $request)
    {
        Work::create($this->validateData($request));

        return redirect()->route('admin.works.index')->with('success', 'Project added.');
    }

    public function edit(Work $work)
    {
        return view('admin.works.form', compact('work'));
    }

    public function update(Request $request, Work $work)
    {
        $work->update($this->validateData($request));

        return redirect()->route('admin.works.index')->with('success', 'Project updated.');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return back()->with('success', 'Project removed.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:160'],
            'client' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:120'],
            'industry' => ['nullable', 'string', 'max:120'],
            'year' => ['nullable', 'string', 'max:10'],
            'summary' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string', 'max:255'],
            'image_url' => ['nullable', 'string'],
            'featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]);

        $data['slug'] = Str::slug($data['slug'] ?: $data['title']);
        $data['featured'] = $request->boolean('featured');
        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $request->integer('sort_order');

        return $data;
    }
}
