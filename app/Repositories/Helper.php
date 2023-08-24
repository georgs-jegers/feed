<?php

namespace App\Repositories;

class Helper
{
    private static array $countries = [
        'ae', 'ar', 'at', 'au', 'be', 'bg', 'br', 'ca', 'ch', 'cn', 'co', 'cu',
        'cz', 'de', 'eg', 'fr', 'gb', 'gr', 'hk', 'hu', 'id', 'ie', 'il', 'in',
        'it', 'jp', 'kr', 'lt', 'lv', 'ma', 'mx', 'my', 'ng', 'nl', 'no', 'nz',
        'ph', 'pl', 'pt', 'ro', 'rs', 'ru', 'sa', 'se', 'sg', 'si', 'sk', 'th',
        'tr', 'tw', 'ua', 'us', 've', 'za'
    ];

    private static array $categories = [
        'business', 'entertainment', 'general', 'health', 'science', 'sports', 'technology'
    ];

    public static function isValidCountry($country): bool
    {
        return in_array($country, self::$countries);
    }

    public static function isValidCategory($category): bool
    {
        return in_array($category, self::$categories);
    }
}
