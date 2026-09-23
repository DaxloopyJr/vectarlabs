<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    public function index()
    {
        return view('admin.slides.index', ['slides' => HeroSlide::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.slides.form', ['slide' => new HeroSlide(['published' => true])]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $this->handleImageUpload($request, $data);
        HeroSlide::create($data);

        return redirect()->route('admin.slides.index')->with('success', 'Slide added.');
    }

    public function edit(HeroSlide $slide)
    {
        return view('admin.slides.form', ['slide' => $slide]);
    }

    public function update(Request $request, HeroSlide $slide)
    {
        $data = $this->validateData($request);
        $this->handleImageUpload($request, $data, $slide->image_url);
        $slide->update($data);

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated.');
    }

    public function destroy(HeroSlide $slide)
    {
        $this->deleteLocalImage($slide->image_url);
        $slide->delete();

        return back()->with('success', 'Slide removed.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title1' => ['required', 'string', 'max:255'],
            'title2' => ['nullable', 'string', 'max:255'],
            'title3' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:120'],
            'button_url' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:10240'],
            'image_url' => ['nullable', 'string'],
            'chips' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]);

        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $request->integer('sort_order');
        unset($data['image']);

        return $data;
    }

    private function handleImageUpload(Request $request, array &$data, ?string $oldImageUrl = null): void
    {
        if (! $request->hasFile('image')) {
            return;
        }

        $path = $request->file('image')->store('slides', 'public');
        $this->deleteLocalImage($oldImageUrl);
        $data['image_url'] = Storage::url($path);
    }

    private function deleteLocalImage(?string $imageUrl): void
    {
        if ($imageUrl && str_starts_with($imageUrl, '/storage/')) {
            Storage::disk('public')->delete(substr($imageUrl, strlen('/storage/')));
        }
    }
}
