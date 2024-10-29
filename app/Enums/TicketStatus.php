<?php

namespace App\Enums;

use App\Traits\HasValues;

enum TicketStatus: string
{
    use HasValues;

    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case RESOLVED = 'resolved';
    case CLOSED = 'closed';
}
