<?php

namespace App\Enums;

use App\Traits\EnumToArray;
enum PaymentStatusEnum: string
{
    use EnumToArray;

    case NEW = 'nem';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case EXPIRED = 'expired ';
    case REJECTED = 'rejected';
}
