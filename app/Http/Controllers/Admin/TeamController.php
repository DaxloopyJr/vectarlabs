<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

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
        TeamMember::create($this->validateData($request));

        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $team->update($this->validateData($request));

        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();

        return back()->with('success', 'Team member removed.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'photo_url' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'published' => ['boolean'],
        ]) + ['published' => $request->boolean('published'), 'sort_order' => $request->integer('sort_order')];
    }
}
