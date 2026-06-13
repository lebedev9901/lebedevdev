<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class VkPublishService
{
    private string $apiUrl = 'https://api.vk.com/method/';

    public function publishProject(Project $project): void
{
    $message = "🚀 Новый проект в портфолио\n\n";
    $message .= $project->title . "\n\n";
    $message .= $project->short_description . "\n\n";
    $message .= $project->technologies . "\n\n";
    $message .= "Подробнее:\n";
    $message .= route('projects.show', $project);

    $this->call('wall.post', [
        'owner_id' => '-' . config('services.vkontakte.group_id'),
        'from_group' => 1,
        'message' => $message,
    ]);
}

    private function uploadWallPhoto(string $imagePath): ?string
    {
        $groupId = config('services.vkontakte.group_id');

        $server = $this->call('photos.getWallUploadServer', [
            'group_id' => $groupId,
        ]);

        $uploadUrl = $server['upload_url'] ?? null;

        if (!$uploadUrl) {
            return null;
        }

        $fullPath = Storage::disk('public')->path($imagePath);

        $upload = Http::attach(
            'photo',
            file_get_contents($fullPath),
            basename($fullPath)
        )->post($uploadUrl)->json();

        $saved = $this->call('photos.saveWallPhoto', [
            'group_id' => $groupId,
            'photo' => $upload['photo'] ?? '',
            'server' => $upload['server'] ?? '',
            'hash' => $upload['hash'] ?? '',
        ]);

        $photo = $saved[0] ?? null;

        if (!$photo) {
            return null;
        }

        return 'photo' . $photo['owner_id'] . '_' . $photo['id'];
    }

    private function call(string $method, array $params = []): array
    {
        $response = Http::asForm()->post($this->apiUrl . $method, array_merge($params, [
            'access_token' => config('services.vkontakte.group_token'),
            'v' => config('services.vkontakte.api_version'),
        ]))->json();

        if (isset($response['error'])) {
            logger()->error('VK API error', [
                'method' => $method,
                'error' => $response['error'],
            ]);

            throw new \Exception($response['error']['error_msg'] ?? 'VK API error');
        }

        return $response['response'] ?? [];
    }
}