<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'bail|required|string',
            'id_categories' => 'bail|required',
            'regular_price' => 'bail|required|numeric',
            'gender' => 'bail|required',
            'description' => 'bail|required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm !',
            'name.string' => 'Vui lòng nhập tên bằng chữ !',
            'id_categories.required' => 'Vui lòng chọn danh mục sản phẩm !',
            'regular_price.required' => 'Vui lòng nhập giá sản phẩm !',
            'regular_price.numeric' => 'Vui lòng nhập giá bằng số !',
            'gender.required' => 'Vui lòng chọn thể loại sản phẩm !',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm !',
        ];
    }
}
