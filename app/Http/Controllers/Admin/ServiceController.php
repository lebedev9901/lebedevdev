<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('sort_order')->latest()->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],

            'advantages' => ['nullable', 'string'],
            'stages' => ['nullable', 'string'],

            'icon' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,hidden'],
            'sort_order' => ['nullable', 'integer'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $data['advantages'] = $this->textareaToArray($data['advantages'] ?? null);
        $data['stages'] = $this->textareaToArray($data['stages'] ?? null);
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $data['slug'] = Str::slug($data['title']);

        Service::create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],

            'advantages' => ['nullable', 'string'],
            'stages' => ['nullable', 'string'],

            'icon' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,hidden'],
            'sort_order' => ['nullable', 'integer'],

            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
        ]);

        $data['advantages'] = $this->textareaToArray($data['advantages'] ?? null);
        $data['stages'] = $this->textareaToArray($data['stages'] ?? null);
        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $data['slug'] = \Illuminate\Support\Str::slug($data['title']);

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
         $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Услуга удалена');
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
}
