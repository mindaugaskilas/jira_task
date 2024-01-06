<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PAUSE = 'pause';
    case WORKING = 'working';
    case TESTING = 'testing';
    case RELEASE = 'release';
}
