<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        
        $user = Auth::user();
        $date = Carbon::now()->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y');

        return Inertia::render('Dashboard', compact('user','date'));
    }
}
