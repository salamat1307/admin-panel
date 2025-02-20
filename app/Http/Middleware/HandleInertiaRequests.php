<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
                'warning' => fn () => $request->session()->get('warning'),
                'info' => fn () => $request->session()->get('info'),
            ],
            'auth' => [
                'user' => $request->user(),
                'roles' => $request->user() ? $request->user()->roles()->pluck('code')->toArray() : []
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },

            // Locales data
            'locales' => function () {
                $locales = LaravelLocalization::getSupportedLocales();
                $localizedURLs = [];

                foreach ($locales as $localeCode => $properties) {
                    $localizedURLs[] = [
                        'code' => $localeCode,
                        'native' => $properties['native'],
                        'url' => LaravelLocalization::getLocalizedURL($localeCode),
                    ];
                }
                return $localizedURLs;
            },

            'locale' => function() {
                return app()->getLocale();
            }
        ];
    }
}
