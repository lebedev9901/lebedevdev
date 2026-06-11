<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CooperationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CooperationApiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'site_type' => ['nullable', 'string', 'max:255'],
            'design' => ['nullable', 'string', 'max:255'],
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'max:255'],
            'budget' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'string', 'max:255'],
            'examples' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tz_file' => ['nullable', 'file', 'max:10240', 'mimes:pdf,doc,docx,txt,zip,rar'],
        ]);

        $data['tz_file'] = null;

        if ($request->hasFile('tz_file')) {
            $data['tz_file'] = $request->file('tz_file')
                ->store('cooperation/tz', 'public');
        }

        $cooperationRequest = CooperationRequest::create($data);

        $message = $this->makeVkMessage($cooperationRequest);

        if (!empty($data['tz_file'])) {
            $tzUrl = url('storage/' . $data['tz_file']);

            $message .= "\n\nТЗ прикреплено:";
            $message .= "\n" . $tzUrl;
        }

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

        return response()->json([
            'success' => true,
            'message' => 'Заявка успешно отправлена',
            'data' => $cooperationRequest,
        ], 201);
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