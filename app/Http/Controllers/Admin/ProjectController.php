<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateProject($request);

        $data['slug'] = Str::slug($data['title']);
        $data['technologies'] = $this->textareaToArray($data['technologies'] ?? null);


       if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('projects', 'public');

        }

        Project::create($data);
        
        $project = Project::create($data);

        $this->storeProjectFiles($request, $project);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Проект добавлен');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateProject($request);

        $data['slug'] = Str::slug($data['title']);
        $data['technologies'] = $this->textareaToArray($data['technologies'] ?? null);

        if ($request->hasFile('image')) {

            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $data['image'] = $request->file('image')->store('projects', 'public');
        } else {
            unset($data['image']);
        }

        $project->update($data);
        $this->storeProjectFiles($request, $project);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Проект обновлён');
    }

    public function destroy(Project $project)
    {
        
        if ($project->image) {

            Storage::disk('public')
                ->delete($project->image);

        }
        $project->delete();
        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Проект удалён');
    }

    private function validateProject(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:5120'],
            'documents' => ['nullable', 'array'],
            'documents.*' => ['file', 'max:10240'],
            'link' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:completed,in_progress,support,in_work'],
            'technologies' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }

    private function textareaToArray(?string $value): array
    {
        if (!$value) {
            return [];
        }
        

        return collect(explode("\n", $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->toArray();
    }

    private function storeProjectFiles(Request $request, Project $project): void
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $project->files()->create([
                    'type' => 'image',
                    'path' => $image->store('projects/images', 'public'),
                    'name' => $image->getClientOriginalName(),
                ]);
            }
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $document) {
                $project->files()->create([
                    'type' => 'document',
                    'path' => $document->store('projects/documents', 'public'),
                    'name' => $document->getClientOriginalName(),
                ]);
            }
        }
    }
}