<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as ControllersController;
use App\Models\CooperationRequest;
use Controller\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CooperationController extends ControllersController
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'site_type' => ['nullable', 'string', 'max:255'],
            'design' => ['nullable', 'string', 'max:255'],
            'features' => ['nullable', 'array'],
            'budget' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'string', 'max:255'],
            'examples' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $cooperationRequest = CooperationRequest::create($data);

        $message = $this->makeVkMessage($cooperationRequest);

        $response = Http::asForm()->post('https://api.vk.com/method/messages.send', [
            'access_token' => config('services.vkontakte.group_token'),
            'v' => config('services.vkontakte.api_version'),
            'user_id' => config('services.vkontakte.admin_id'),
            'random_id' => random_int(1, PHP_INT_MAX),
            'message' => $message,
        ]);

        if ($response->failed() || isset($response->json()['error'])) {
            Log::error('VK cooperation request send failed', [
                'request_id' => $cooperationRequest->id,
                'response' => $response->json(),
            ]);
        }
        
        return back()->with('success', 'Заявка отправлена! Я свяжусь с вами в ближайшее время.');
    }

    private function makeVkMessage(CooperationRequest $request): string
    {
        $features = $request->features
            ? implode(', ', $request->features)
            : 'Не указано';

        return
            "🔥 Новая заявка на разработку\n\n" .
            "ID заявки: {$request->id}\n" .
            "Имя: {$request->name}\n" .
            "Контакт: {$request->contact}\n" .
            "Тип сайта: " . ($request->site_type ?? 'Не указано') . "\n" .
            "Дизайн: " . ($request->design ?? 'Не указано') . "\n" .
            "Функции: {$features}\n" .
            "Бюджет: " . ($request->budget ?? 'Не указано') . "\n" .
            "Сроки: " . ($request->deadline ?? 'Не указано') . "\n" .
            "Примеры: " . ($request->examples ?? 'Не указано') . "\n\n" .
            "Описание:\n{$request->description}";
    }
}
