<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', ['testimonials' => Testimonial::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial(['published' => true])]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $this->handlePhotoUpload($request, $data);
        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $this->validateData($request);
        $this->handlePhotoUpload($request, $data, $testimonial->photo_url);
        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->deleteLocalPhoto($testimonial->photo_url);
        $testimonial->delete();

        return back()->with('success', 'Testimonial removed.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'author' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'quote' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:10240'],
            'photo_url' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]);

        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $request->integer('sort_order');
        unset($data['photo']);

        return $data;
    }

    private function handlePhotoUpload(Request $request, array &$data, ?string $oldPhotoUrl = null): void
    {
        if (! $request->hasFile('photo')) {
            return;
        }

        $path = $request->file('photo')->store('testimonials', 'public');
        $this->deleteLocalPhoto($oldPhotoUrl);
        $data['photo_url'] = Storage::url($path);
    }

    private function deleteLocalPhoto(?string $photoUrl): void
    {
        if ($photoUrl && str_starts_with($photoUrl, '/storage/')) {
            Storage::disk('public')->delete(substr($photoUrl, strlen('/storage/')));
        }
    }
}
