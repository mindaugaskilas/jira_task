<?php

namespace App\Helpers;

class CustomHelper
{
    public static function arrayToOptions(array $array, string $key, string $value): array
    {
        return array_column($array, $value, $key);
    }

    public static function filterByValue(array $array, string $filteredValue, string $filteredKey): array
    {
        return array_filter($array, function ($var) use ($filteredValue, $filteredKey) {
            return ($var[$filteredKey] === $filteredValue);
        });
    }
}
