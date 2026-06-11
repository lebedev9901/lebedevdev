<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml';

    public function handle(): int
    {
        $urls = [];

        $add = function (string $url, string $priority = '0.8', string $changefreq = 'weekly', ?string $lastmod = null) use (&$urls) {
            $urls[] = [
                'loc' => url($url),
                'lastmod' => $lastmod ?? now()->toDateString(),
                'changefreq' => $changefreq,
                'priority' => $priority,
            ];
        };

        $add('/', '1.0', 'weekly');
        $add('/services', '0.9', 'weekly');
        $add('/projects', '0.9', 'weekly');
        $add('/cooperation', '0.7', 'monthly');

        Service::query()->get()->each(function ($service) use ($add) {
            $add(
                '/services/' . $service->slug,
                '0.8',
                'monthly',
                optional($service->updated_at)->toDateString()
            );
        });

        Project::query()->get()->each(function ($project) use ($add) {
            $add(
                '/projects/' . $project->slug,
                '0.8',
                'monthly',
                optional($project->updated_at)->toDateString()
            );
        });

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>'.$url['loc'].'</loc>';
            $xml .= '<lastmod>'.$url['lastmod'].'</lastmod>';
            $xml .= '<changefreq>'.$url['changefreq'].'</changefreq>';
            $xml .= '<priority>'.$url['priority'].'</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated successfully.');

        return self::SUCCESS;
    }
}