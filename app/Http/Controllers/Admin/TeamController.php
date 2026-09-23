<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        return view('admin.team.index', ['members' => TeamMember::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.team.form', ['member' => new TeamMember(['published' => true])]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $this->handlePhotoUpload($request, $data);
        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $this->validateData($request);
        $this->handlePhotoUpload($request, $data, $team->photo_url);
        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $this->deleteLocalPhoto($team->photo_url);
        $team->delete();

        return back()->with('success', 'Team member removed.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:160'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:10240'],
            'photo_url' => ['nullable', 'string'],
            'email' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:60'],
            'website' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]);

        $data['slug'] = \Illuminate\Support\Str::slug($data['slug'] ?: $data['name']);
        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $request->integer('sort_order');
        unset($data['photo']);

        return $data;
    }

    /**
     * Store an uploaded photo on the public disk and point photo_url at it.
     * An uploaded file always wins over a pasted URL.
     */
    private function handlePhotoUpload(Request $request, array &$data, ?string $oldPhotoUrl = null): void
    {
        if (! $request->hasFile('photo')) {
            return;
        }

        $path = $request->file('photo')->store('team', 'public');
        $this->deleteLocalPhoto($oldPhotoUrl);
        $data['photo_url'] = Storage::url($path);
    }

    /**
     * Remove a previously uploaded local photo (only files under /storage/).
     */
    private function deleteLocalPhoto(?string $photoUrl): void
    {
        if ($photoUrl && str_starts_with($photoUrl, '/storage/')) {
            Storage::disk('public')->delete(substr($photoUrl, strlen('/storage/')));
        }
    }
}
