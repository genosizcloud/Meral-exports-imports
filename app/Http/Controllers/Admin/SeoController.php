<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Support\PublicImage;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $seo = SiteSetting::where('group', 'seo')->pluck('value', 'key')->toArray();
        return view('admin.seo.index', compact('seo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'seo_site_title'       => 'required|string|max:120',
            'seo_description'      => 'required|string|max:320',
            'seo_keywords'         => 'nullable|string|max:500',
            'seo_canonical_url'    => 'nullable|url|max:255',
            'seo_og_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'seo_robots'           => 'required|string',
            'seo_twitter_card'     => 'required|string',
        ]);

        if ($request->hasFile('seo_og_image')) {
            $old = SiteSetting::where('key', 'seo_og_image')->value('value');
            PublicImage::delete($old);

            // Legacy file at public root
            if (is_file(public_path('og-image.jpg'))) {
                unlink(public_path('og-image.jpg'));
            }

            $path = PublicImage::store($request->file('seo_og_image'), 'seo', 'og-image');
            SiteSetting::set('seo_og_image', $path, 'seo');
        }

        $skip = ['_token', '_method', 'seo_og_image'];
        foreach ($request->except($skip) as $key => $value) {
            SiteSetting::set($key, $value, 'seo');
        }

        return back()->with('success', 'SEO settings saved successfully!');
    }
}
