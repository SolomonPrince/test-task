<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum PaymentTwoStatus: string
{
    use EnumToArray;

    case CREATED = 'created';
    case INPROGRESS = 'inprogress';
    case PAID = 'paid';
    case EXPIRED = 'expired';
    case REJECTED = 'rejected';
}
