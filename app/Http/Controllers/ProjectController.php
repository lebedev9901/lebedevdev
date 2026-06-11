<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as ControllersController;
use App\Models\Project;
use Controller\Controller;
use Illuminate\Http\Request;

class ProjectController extends ControllersController
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')
            ->latest()
            ->get();

        return view('pages.projects', compact('projects'));
    }

    public function show(Project $project)
    {

        return view('projects.show', compact('project'));
    }
}
