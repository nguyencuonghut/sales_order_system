<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'product_id' => 'required',
            'weight' => 'required',
            'delivery_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Yêu cầu bạn PHẢI điền "Sản phẩm"',
            'weight.required' => 'Yêu cầu bạn PHẢI điền "Khối lượng"',
            'delivery_date.required' => 'Yêu cầu bạn PHẢI điền "Thời hạn giao hàng (dự kiến)"',
        ];
    }
}
