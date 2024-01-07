<?php

namespace App\Enums;

use App\Helpers\CustomHelper;

enum TaskTypeEnum: string
{
    case ISSUE = 'issue';
    case BUG = 'bug';

    public static function values(): array
    {
        return CustomHelper::arrayToOptions(self::cases(), 'value', 'value');
    }
}
