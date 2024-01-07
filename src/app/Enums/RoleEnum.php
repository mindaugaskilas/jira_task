<?php

namespace App\Enums;

use App\Helpers\CustomHelper;

enum RoleEnum: string
{
    case CREATOR = 'creator';
    case TESTER = 'tester';
    case EXECUTOR = 'executor';

    public static function values(): array
    {
        return CustomHelper::arrayToOptions(self::cases(), 'value', 'value');
    }
}
