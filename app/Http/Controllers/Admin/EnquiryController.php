<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $enquiries = Enquiry::query()
            ->when($status && in_array($status, ['new', 'read', 'replied', 'archived'], true), fn ($q) => $q->where('status', $status))
            ->orderByDesc('created_at')
            ->get();

        $counts = [
            'all'      => Enquiry::count(),
            'new'      => Enquiry::where('status', 'new')->count(),
            'read'     => Enquiry::where('status', 'read')->count(),
            'replied'  => Enquiry::where('status', 'replied')->count(),
            'archived' => Enquiry::where('status', 'archived')->count(),
        ];

        return view('admin.enquiries.index', compact('enquiries', 'counts', 'status'));
    }

    public function show(Enquiry $enquiry)
    {
        if ($enquiry->status === 'new') {
            $enquiry->update(['status' => 'read']);
            $enquiry->refresh();
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,archived',
        ]);

        $enquiry->update(['status' => $request->status]);

        return back()->with('success', 'Enquiry status updated.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry deleted.');
    }
}
