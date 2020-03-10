<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PageRequest extends FormRequest
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
    public function rules(Request $request)
    {

        if($request->isMethod('POST')){
            switch ($this->route()->getName()) {
                case 'global_create_page':
                    return [
                        'title' => ['required', 'string', 'between:4,255'],
                        'alias' => ['required', 'unique:articles'],
                        'text' => ['required'],
                        'image' => 'mimes:jpg,bmp,png,jpeg|max:5120',
                    ];
                    break;
                case 'global_edit_page':
                    if(empty($request->alias)){
                        return [
                            'title' => ['required', 'string', 'between:4,255'],
                            'text' => ['required'],
                            'image' => 'mimes:jpg,bmp,png,jpeg|max:5120',
                        ];
                        break;
                    }else{
                        return [
                            'title' => ['required', 'string', 'between:4,255'],
                            'alias' => ['required', 'unique:articles'],
                            'text' => ['required'],
                            'image' => 'mimes:jpg,bmp,png,jpeg|max:5120',
                        ];
                        break;
                    }


                case 'uploads_page':
                    return [];
                    break;
            }
        }else{
            return [];
        }

    }

    public function messages()
    {
        return [
            'title.required' => 'Відсутній заголовок!',
            'title.between' => 'Заголовок повинен містити від 4 до 255 символів!',
            'alias.unique' => 'Заголовок з такою назвою вже існує!',
            'alias.required' => 'Оновіть назву [добавте літеру та зітріть]',
            'image.mimes' => 'Зображення повино бути форматів: jpg, bmp, png, jpeg',
            'image.max' => 'Зображення перевищує 5120кб!',
            'text.required' => 'Поле не повинно бути порожнім!',
        ];
    }
}
