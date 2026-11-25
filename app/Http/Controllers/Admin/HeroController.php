<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroContent;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = HeroContent::firstOrCreate(['id' => 1]);
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'badge_text'         => 'required|string|max:100',
            'title_line1'        => 'required|string|max:100',
            'title_highlight'    => 'required|string|max:100',
            'title_line2'        => 'required|string|max:100',
            'title_line3'        => 'required|string|max:100',
            'subtitle'           => 'nullable|string',
            'btn_primary_text'   => 'required|string|max:60',
            'btn_secondary_text' => 'required|string|max:60',
            'stat1_number'       => 'required|string|max:20',
            'stat1_label'        => 'required|string|max:40',
            'stat2_number'       => 'required|string|max:20',
            'stat2_label'        => 'required|string|max:40',
            'stat3_number'       => 'required|string|max:20',
            'stat3_label'        => 'required|string|max:40',
        ]);
        HeroContent::updateOrCreate(['id' => 1], $data);
        return back()->with('success', 'Hero section updated successfully!');
    }
}
