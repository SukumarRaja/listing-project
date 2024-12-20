<?php

// Set sidebar active
if (!function_exists('setSidebarActive')) {

    function setSidebarActive(array $routes): ?string
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }

        return null;
    }
}


// Get youtupe thumbnail
if (!function_exists('getYtThumbnail')) {

    function getYtThumbnail(string $url): ?string
    {
        $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

        if (preg_match($pattern, $url, $matches)) {

            $id = $matches[1];

            return "https://img.youtube.com/vi/$id/mqdefault.jpg";
        }
        return null;
    }
}

// String truncate
if (!function_exists('truncate')) {

    function truncate(string $text, int $limit = 25): ?string
    {
        return \Str::of($text)->limit($limit);
    }
}

// Currency position
if (!function_exists('currencyPosition')) {

    function currencyPosition($amount): ?string
    {
        if (config('settings.site_currency_position') === 'left') {
            return config('settings.site_currency_icon') . $amount;
        } else {
            return $amount . config('settings.site_currency_icon');
        }
    }
}
