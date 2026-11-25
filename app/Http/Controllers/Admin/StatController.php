<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('sort_order')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.form', ['stat' => new Stat, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        Stat::create($this->validated($request));
        return redirect()->route('admin.stats.index')->with('success', 'Stat created!');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.form', compact('stat') + ['action' => 'edit']);
    }

    public function update(Request $request, Stat $stat)
    {
        $stat->update($this->validated($request));
        return redirect()->route('admin.stats.index')->with('success', 'Stat updated!');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back()->with('success', 'Stat deleted!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'value'      => 'required|integer|min:0',
            'suffix'     => 'required|string|max:10',
            'label'      => 'required|string|max:60',
            'sort_order' => 'integer|min:0',
        ]);
    }
}
