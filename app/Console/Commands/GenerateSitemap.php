<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     */
    protected $description = 'Generate the sitemap.xml file';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Generating sitemap...');

        $baseUrl = config('app.url');
        $now = now()->toW3cString();

        $urls = [];

        // Static pages
        $staticPages = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => '/shop', 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => '/compliance', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/trade/register', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => '/trade/login', 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => $baseUrl . $page['loc'],
                'lastmod' => $now,
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority'],
            ];
        }

        // Category pages
        $categories = Category::all();
        foreach ($categories as $category) {
            $urls[] = [
                'loc' => $baseUrl . '/shop/' . $category->slug,
                'lastmod' => $category->updated_at->toW3cString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // Product pages
        $products = Product::where('is_published', true)->get();
        foreach ($products as $product) {
            $urls[] = [
                'loc' => $baseUrl . '/product/' . $product->slug,
                'lastmod' => $product->updated_at->toW3cString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ];
        }

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . PHP_EOL;
            $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . PHP_EOL;
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        // Write to public directory
        File::put(public_path('sitemap.xml'), $xml);

        $this->info('Sitemap generated with ' . count($urls) . ' URLs.');
        $this->info('File saved to: public/sitemap.xml');

        return Command::SUCCESS;
    }
}
