<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        // Normalize field aliases from trade quote forms
        if (! $request->has('product') && $request->has('product_name')) {
            $request->merge(['product' => $request->input('product_name')]);
        }
        if (! $request->has('country') && $request->has('destination_port')) {
            $request->merge(['country' => $request->input('destination_port')]);
        }
        if (! $request->has('quantity') && $request->has('volume')) {
            $request->merge(['quantity' => $request->input('volume')]);
        }
        if (empty($request->input('message'))) {
            $extra = array_filter([
                'Incoterm' => $request->input('incoterm'),
                'Packaging' => $request->input('packaging'),
                'Volume' => $request->input('volume'),
                'Port' => $request->input('destination_port'),
            ]);
            $msg = 'RFQ Inquiry for: ' . ($request->input('product') ?? 'Commodities');
            if (! empty($extra)) {
                $msg .= ' (' . http_build_query($extra, '', ', ') . ')';
            }
            $request->merge(['message' => $msg]);
        }

        $data = $request->validate([
            'name'             => 'required|string|max:120',
            'company'          => 'nullable|string|max:120',
            'email'            => 'required|email|max:150',
            'phone'            => 'nullable|string|max:30',
            'product'          => 'nullable|string|max:120',
            'country'          => 'nullable|string|max:80',
            'quantity'         => 'nullable|string|max:80',
            'message'          => 'required|string|max:5000',
        ]);

        Enquiry::create([
            'name'             => $data['name'],
            'company'          => $data['company'] ?? null,
            'email'            => $data['email'],
            'phone'            => $data['phone'] ?? null,
            'product_interest' => $data['product'] ?? null,
            'country'          => $data['country'] ?? null,
            'quantity'         => $data['quantity'] ?? null,
            'message'          => $data['message'],
            'status'           => 'new',
        ]);

        return back()->with('success', 'Your formal wholesale quotation request has been received. Our trade desk will respond within 24 business hours.');
    }
}
