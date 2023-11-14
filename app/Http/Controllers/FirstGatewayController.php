<?php

namespace App\Http\Controllers;

use App\Http\Requests\FirstGatewayRequest;
use App\Services\PaymentService;
use App\Data\PaymentData;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Helpers\GenerateSHA;

class FirstGatewayController extends Controller
{
    public function __construct(
        protected readonly PaymentService $service,
    ){}

    public function __invoke(FirstGatewayRequest $request): JsonResponse
    {
        try {
            $payment = $this->service->store(
                PaymentData::fromFirstGatewayRequest($request)
            );
            $user = User::find($payment->merchant_id);
            $hash = GenerateSHA::generate($payment, $user->merchant_key);
            return $this->sendResponse($hash);
        }catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
