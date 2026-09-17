<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::latest()->get()]);
    }

    public function create()
    {
        return view('admin.posts.form', ['post' => new Post(['published' => true, 'cover_style' => 'gradient-a'])]);
    }

    public function store(Request $request)
    {
        Post::create($this->validateData($request));

        return redirect()->route('admin.posts.index')->with('success', 'Article created.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->validateData($request));

        return redirect()->route('admin.posts.index')->with('success', 'Article updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Article deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'tag' => ['nullable', 'string', 'max:120'],
            'cover_style' => ['nullable', 'string', 'max:60'],
            'published' => ['boolean'],
        ]) + ['published' => $request->boolean('published')];
    }
}
