<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use App\Http\Requests\FirstGatewayRequest;
use App\Http\Requests\SecondGatewayRequest;

class PaymentData extends Data
{
    public function __construct(
      public int $merchant_id,
      public int $payment_id,
      public string $status,
      public int $amount,
      public int $amount_paid,
      public ?int $timestamp,
      public ?string $sign,
      public ?string $rand
    ) {}

    public static function fromFirstGatewayRequest(FirstGatewayRequest $request): PaymentData
    {
        return new self(
            merchant_id:  $request->merchant_id,
            payment_id:   $request->payment_id,
            status:   $request->status,
            amount: $request->amount,
            amount_paid: $request->amount_paid,
            timestamp: $request->timestamp,
            sign: $request->sign,
            rand: null,
        );
    }

    public static function fromSecondGatewayRequest(SecondGatewayRequest $request): PaymentData
    {
        return new self(
            merchant_id:  $request->project,
            payment_id:   $request->invoice,
            status:   $request->status,
            amount: $request->amount,
            amount_paid: $request->amount_paid,
            timestamp: (string) Carbon::now()->timestamp,
            sign: null,
            rand: $request->rand,
        );
    }
}
