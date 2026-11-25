<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExportCountry;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ExportCountryController extends Controller
{
    public function index()
    {
        $countries = ExportCountry::orderBy('sort_order')->get();
        $section = [
            'countries_section_label'    => SiteSetting::where('key', 'countries_section_label')->value('value') ?? 'Global Reach',
            'countries_section_title'    => SiteSetting::where('key', 'countries_section_title')->value('value') ?? 'Countries We Export To',
            'countries_section_subtitle' => SiteSetting::where('key', 'countries_section_subtitle')->value('value') ?? '',
        ];

        return view('admin.countries.index', compact('countries', 'section'));
    }

    public function updateSection(Request $request)
    {
        $data = $request->validate([
            'countries_section_label'    => 'required|string|max:80',
            'countries_section_title'    => 'required|string|max:120',
            'countries_section_subtitle' => 'required|string|max:500',
        ]);

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], [
                'value' => $value,
                'group' => 'sections',
            ]);
        }

        return back()->with('success', 'Section heading updated!');
    }

    public function create()
    {
        return view('admin.countries.form', ['country' => new ExportCountry, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        ExportCountry::create($this->validated($request));
        return redirect()->route('admin.countries.index')->with('success', 'Country added!');
    }

    public function edit(ExportCountry $country)
    {
        return view('admin.countries.form', compact('country') + ['action' => 'edit']);
    }

    public function update(Request $request, ExportCountry $country)
    {
        $country->update($this->validated($request));
        return redirect()->route('admin.countries.index')->with('success', 'Country updated!');
    }

    public function destroy(ExportCountry $country)
    {
        $country->delete();
        return back()->with('success', 'Country removed!');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => 'required|string|max:80',
            'flag_emoji'  => 'required|string|max:20',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
