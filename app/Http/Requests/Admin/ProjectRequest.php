<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'Required | min:2 | max:70',
            'client_name' => 'Required | min:2 | max:70',
            'cover_image' => 'nullable|image|max:18874368',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il Nome Progetto è obbligatorio',
            'name.max' => 'Il Nome Progetto deve essere massimo di :max caratteri',
            'name.min' => 'Il Nome Progetto deve essere di minimo :min caratteri',
            'client_name' => 'Il Nome cliente è obbligatorio',
            'client_name.max' => 'Il Nome cliente deve essere massimo di :max caratteri',
            'client_name.min' => 'Il Nome cliente deve essere di minimo :min caratteri',
            //'cover_image' => 'L\'immagine è obbligatoria',
            //'cover_image.max' => 'L\'immagine deve essere massimo di :max caratteri',
            //'cover_image.min' => 'L\'immagine deve essere di minimo :min caratteri',

        ];
    }
}
