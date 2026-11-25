<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.form', ['feature' => new Feature, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        Feature::create($this->validated($request));
        return redirect()->route('admin.features.index')->with('success', 'Feature created!');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.form', compact('feature') + ['action' => 'edit']);
    }

    public function update(Request $request, Feature $feature)
    {
        $feature->update($this->validated($request));
        return redirect()->route('admin.features.index')->with('success', 'Feature updated!');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return back()->with('success', 'Feature deleted!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'icon'        => 'required|string|max:10',
            'title'       => 'required|string|max:100',
            'description' => 'required|string',
            'sort_order'  => 'integer|min:0',
            'is_active'   => 'boolean',
        ]);
    }
}
