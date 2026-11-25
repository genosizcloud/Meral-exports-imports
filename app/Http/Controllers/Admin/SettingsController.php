<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $groups = ['general', 'contact', 'social', 'sections'];
        $settings = [];
        foreach ($groups as $g) {
            $settings[$g] = SiteSetting::where('group', $g)->pluck('value', 'key')->toArray();
        }
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        foreach ($data as $key => $value) {
            SiteSetting::set($key, $value);
        }
        return back()->with('success', 'Settings saved!');
    }
}
