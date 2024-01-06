<?php

namespace App\Enums;

enum RoleEnum: string
{
    case CREATOR = 'creator';
    case TESTER = 'tester';
    case EXECUTOR = 'executor';
}
