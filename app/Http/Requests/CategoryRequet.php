<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequet extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpg,bmp,png,jpeg|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'image.mimes' => 'Зображення повино бути форматів: jpg, bmp, png, jpeg',
            'image.max' => 'Зображення перевищує 5120кб!',
            'image.required' => 'Добавте зображення',
        ];
    }
}
