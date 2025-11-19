<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LaravelVersionCheckerService
{
    public function getCurrentVersion(): string
    {
        return app()->version(); // contoh: "11.3.0"
    }

    public function getLatestVersion(): ?string
    {
        return Cache::remember('llv', 60 * 60 * 24, function () {
            try {
                $response = Http::get('https://repo.packagist.org/p2/laravel/framework.json');

                if (! $response->ok()) {
                    return null;
                }

                $data = $response->json();

                // Ambil semua versi dari Packagist
                $versions = $data['packages']['laravel/framework'] ?? [];

                $versionNames = array_column($versions, 'version');

                // Filter yang bukan dev/beta
                $stable = array_filter($versionNames, function ($v) {
                    return ! str_contains($v, 'dev')
                        && ! str_contains($v, 'alpha')
                        && ! str_contains($v, 'beta')
                        && ! str_contains($v, 'RC');
                });

                if (empty($stable)) {
                    return null;
                }

                // Urutkan & ambil yang paling baru
                // usort($stable, 'version_compare');

                if (count($stable) > 0) {
                    return $stable[0];
                }

                return end($stable); // contoh: "v11.5.2"
            } catch (\Throwable $e) {
                // Biar kalau error, nggak ganggu user
                return null;
            }
        });
    }

    public function isOutdated(): bool
    {
        $current = $this->getCurrentVersion();
        $latest  = $this->getLatestVersion();

        if (! $latest) {
            return false; // kalau gagal cek, jangan ganggu user
        }

        return version_compare($current, ltrim($latest, 'v'), '<');
    }
}
