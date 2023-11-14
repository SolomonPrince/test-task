<?php

namespace App\Http\Requests;

use App\Enums\PaymentStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FirstGatewayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'merchant_id' => ['required', 'integer', 'exists:users,id'],
            'payment_id' => ['required', 'integer', Rule::unique('payments')],
            'status' => ['required', 'string', Rule::in(PaymentStatusEnum::values())],
            'amount' => ['required', 'integer'],
            'amount_paid' => ['required', 'integer'],
            'timestamp' => ['required', 'integer'],
            'sign' => ['required', 'string', 'max:255', Rule::unique('payments')]
        ];
    }
}
