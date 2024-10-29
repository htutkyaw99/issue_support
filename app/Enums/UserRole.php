<?php

namespace App\Enums;

use App\Traits\HasValues;

enum UserRole: string
{
    use HasValues;

    case ADMIN = 'admin';
    case USER = 'user';
    case AGENT = 'agent';
}
