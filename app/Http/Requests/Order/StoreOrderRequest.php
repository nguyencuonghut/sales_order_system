<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required',
            'period_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Yêu cầu bạn PHẢI điền "Đại lý"',
            'period_id.unique' => 'Yêu cầu bạn PHẢI điền "Kỳ"',
        ];
    }
}
