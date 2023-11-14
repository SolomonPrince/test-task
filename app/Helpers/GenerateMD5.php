<?php

namespace App\Helpers;

use App\Models\Payment;

class GenerateMD5
{
    public static function generate(Payment $payment, $app_key): string
    {
        $params = [
            'project' => $payment->merchant_id,
            'invoice' => $payment->payment_id,
            'status' => $payment->status,
            'amount' => $payment->amount,
            'amount_paid' => $payment->amount_paid,
            'rand' => $payment->timestamp,
        ];

        ksort($params);

        $concatenatedString = '';
        foreach ($params as $key => $value) {
            $concatenatedString .= $value . '.';
        }

        $concatenatedString .= $app_key;

        return md5($concatenatedString);
    }
}
