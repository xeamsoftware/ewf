<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{    
    /**
     * dashboard
     *
     * Show the application dashboard.
     * @return void
     */
    function dashboard()
    {
        return view('dashboard');
    }
}
