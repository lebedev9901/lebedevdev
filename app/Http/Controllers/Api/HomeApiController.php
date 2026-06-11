<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;

class HomeApiController extends Controller
{
    public function index()
    {
        $services = Service::latest()
            ->take(3)
            ->get()
            ->map(function ($service) {
                return [
                    'id' => $service->id,
                    'title' => $service->title,
                    'slug' => $service->slug,
                    'short_description' => $service->short_description,
                    'description' => $service->description,
                    'icon' => config('services-icons.' . $service->icon) ?? '💻',
                ];
            });

        $projects = Project::latest()
            ->take(3)
            ->get()
            ->map(function ($project) {
                return [
                    'id' => $project->id,
                    'title' => $project->title,
                    'slug' => $project->slug,
                    'subtitle' => $project->subtitle,
                    'short_description' => $project->short_description,
                    'status' => $project->status,
                    'technologies' => $project->technologies,
                    'image' => $project->image
                        ? url('storage/' . $project->image)
                        : null,
                ];
            });

        return response()->json([
            'services' => $services,
            'projects' => $projects,
        ]);
    }
}