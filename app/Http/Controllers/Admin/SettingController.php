<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /** Keys managed through file uploads rather than plain text. */
    public const FILE_KEYS = ['site.logo'];

    public function index()
    {
        $groups = Setting::orderBy('key')->get()->groupBy(fn ($s) => explode('.', $s->key)[0].'.'.(explode('.', $s->key)[1] ?? ''));

        return view('admin.settings.index', ['settings' => Setting::orderBy('key')->get(), 'groups' => $groups]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp,svg', 'max:4096'],
        ]);

        foreach ($request->input('settings', []) as $key => $value) {
            Setting::put($key, (string) $value);
        }

        // Logo upload (stored on the public disk, replaces any previous logo)
        if ($request->hasFile('site_logo')) {
            $old = Setting::get('site.logo');
            if ($old && str_starts_with($old, '/storage/')) {
                Storage::disk('public')->delete(substr($old, strlen('/storage/')));
            }
            Setting::put('site.logo', Storage::url($request->file('site_logo')->store('branding', 'public')));
        }

        // Logo removal
        if ($request->boolean('site_logo_remove')) {
            $old = Setting::get('site.logo');
            if ($old && str_starts_with($old, '/storage/')) {
                Storage::disk('public')->delete(substr($old, strlen('/storage/')));
            }
            Setting::put('site.logo', '');
        }

        return back()->with('success', 'Site content saved.');
    }
}
