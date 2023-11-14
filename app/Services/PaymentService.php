<?php

namespace App\Services;

use App\Data\PaymentData;
use App\Models\Payment;
class PaymentService
{
    public function store(PaymentData $dto): Payment
    {
        return Payment::create([
            'merchant_id' => $dto->merchant_id,
            'payment_id' => $dto->payment_id,
            'status' => $dto->status,
            'amount' => $dto->amount,
            'amount_paid' => $dto->amount_paid,
            'timestamp' => $dto->timestamp,
            'sign' => $dto->sign,
            'rand' => $dto->rand,
        ]);
    }
}
