<?php

namespace App\Enums;

use App\Helpers\CustomHelper;

enum StatusEnum: string
{
    case PAUSE = 'pause';
    case WORKING = 'working';
    case TESTING = 'testing';
    case RELEASE = 'release';

    public static function values(): array
    {
        return CustomHelper::arrayToOptions(self::cases(), 'value', 'value');
    }
}
