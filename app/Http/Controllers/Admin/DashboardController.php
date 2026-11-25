<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Product, Feature, Stat, Enquiry};

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'totalProducts'   => Product::count(),
            'totalCategories' => Category::count(),
            'totalFeatures'   => Feature::count(),
            'totalStats'      => Stat::count(),
            'newEnquiries'    => Enquiry::where('status', 'new')->count(),
            'totalEnquiries'  => Enquiry::count(),
        ]);
    }
}
