<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController 
{
    public function index()
    {
        $services = Service::where('status', 'active')
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        $projects = Project::orderBy('sort_order')
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.home', compact('services', 'projects'));
    }
}
