<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as ControllersController;
use App\Models\Service;
use Controller\Controller;
use Illuminate\Http\Request;

class ServiceController extends ControllersController
{
    public function index()
    {
        $services = Service::where('status', 'active')
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('pages.services', compact('services'));
    }

    public function show(Service $service)
    {
        abort_if($service->status !== 'active', 404);

        return view('services.show', compact('service'));
    }
}
