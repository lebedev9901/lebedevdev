<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceApiController extends Controller
{
    public function index()
    {
        $services = Service::latest()
        ->get()
        ->map(function ($service){
            return [
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'short_description' => $service->short_description,
                'description' => $service->description,
                'icon' => config('services-icons.' . $service->icon)
                    ?? '💻',
            ];
        });

        return response()->json($services);
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return response()->json([
            'id' => $service->id,
            'title' => $service->title,
            'subtitle' => $service->subtitle,
            'slug' => $service->slug,
            'short_description' => $service->short_description,
            'description' => $service->description,
            'advantages' => $service->advantages,
            'stages' => $service->stages,
            'status' => $service->status,
            'icon' => config('services-icons.' . $service->icon)
                ?? '💻',
        ]);
    }
}
