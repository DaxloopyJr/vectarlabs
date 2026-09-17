<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $groups = Setting::orderBy('key')->get()->groupBy(fn ($s) => explode('.', $s->key)[0].'.'.(explode('.', $s->key)[1] ?? ''));

        return view('admin.settings.index', ['settings' => Setting::orderBy('key')->get(), 'groups' => $groups]);
    }

    public function update(Request $request)
    {
        foreach ($request->input('settings', []) as $key => $value) {
            Setting::put($key, (string) $value);
        }

        return back()->with('success', 'Site content saved.');
    }
}
