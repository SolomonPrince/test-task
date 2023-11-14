<?php

namespace App\Helpers;

use App\Models\Payment;

class GenerateSHA
{
    public static function generate(Payment $payment, $merchant_key): string
    {
        $params = [
            'merchant_id' => $payment->merchant_id,
            'payment_id' => $payment->payment_id,
            'status' => $payment->status,
            'amount' => $payment->amount,
            'amount_paid' => $payment->amount_paid,
            'timestamp' => $payment->timestamp,
        ];

        ksort($params);

        $concatenatedString = '';
        foreach ($params as $key => $value) {
            $concatenatedString .= $value . ':';
        }

        $concatenatedString .= $merchant_key;

        return  hash('sha256', $concatenatedString);
    }
}
