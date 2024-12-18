<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required','min:2','max:255'],
            'desc' => ['nullable','max:2048'],
            'price' => ['required','numeric'],
            'categories' => ['required','array'],
            'categories.*' => ['exists:categories,id']
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'test'
        ];
    }

    protected function prepareForValidation()
    {
//        $this->merge(['price' => 0]);
    }
}
