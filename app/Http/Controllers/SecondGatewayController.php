<?php

namespace App\Http\Controllers;

use App\Http\Requests\SecondGatewayRequest;
use App\Services\PaymentService;
use App\Data\PaymentData;
use Illuminate\Http\JsonResponse;
use App\Helpers\GenerateMD5;

class SecondGatewayController extends Controller
{
    public function __construct(
        protected readonly PaymentService $service,
    ){}

    public function __invoke(SecondGatewayRequest $request): JsonResponse
    {
        try {
            $payment = $this->service->store(
                PaymentData::fromSecondGatewayRequest($request)
            );
            $hash = GenerateMD5::generate($payment, auth()->user()->app_key);
            return $this->sendResponse($hash);
        }catch (\Exception $ex) {
            return $this->sendError($ex->getMessage());
        }
    }
}
