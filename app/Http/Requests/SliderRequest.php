<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'slider' => 'required|mimes:jpg,bmp,jpeg|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'slider.mimes' => 'Зображення повино бути форматів: jpg, bmp, jpeg',
            'slider.max' => 'Зображення перевищує 5120кб!',
            'slider.required' => 'Добавте зображення',
        ];
    }
}
