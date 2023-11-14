<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\PaymentTwoStatus;
class SecondGatewayRequest extends FormRequest
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
            'project' => ['required', 'integer', 'exists:users,id'],
            'invoice' => ['required', 'integer', Rule::unique('payments', 'payment_id')],
            'status' => ['required', 'string', Rule::in(PaymentTwoStatus::values())],
            'amount' => ['required', 'integer'],
            'amount_paid' => ['required', 'integer'],
            'rand' => ['required', 'string'],
        ];
    }
}
