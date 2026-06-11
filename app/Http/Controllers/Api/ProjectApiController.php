<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectApiController extends Controller
{
    public function index()
    {
        $projects = Project::latest()
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
                        ? asset('storage/' . $project->image)
                        : null,
                ];
            });

        return response()->json($projects);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)
            ->with('files')
            ->firstOrFail();

        return response()->json([
            'id' => $project->id,
            'title' => $project->title,
            'slug' => $project->slug,
            'subtitle' => $project->subtitle,
            'short_description' => $project->short_description,
            'description' => $project->description,
            'status' => $project->status,
            'technologies' => $project->technologies,
            'image' => $project->image
                ? asset('storage/' . $project->image)
                : null,
            'files' => $project->files->map(function ($file) {
                return [
                    'id' => $file->id,
                    'name' => $file->name ?? basename($file->path),
                    'url' => asset('storage/' . $file->path),
                ];
            }),
        ]);
    }
}