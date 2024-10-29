<?php

namespace App\Enums;

use App\Traits\HasValues;

enum TicketPriority: string
{
    use HasValues;

    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
}
