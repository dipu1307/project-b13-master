<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('backend.dashboard');
    }

    public function showProductList()
    {
        return view('backend.product-list');
    }
}
