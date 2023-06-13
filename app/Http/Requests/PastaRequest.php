<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastaRequest extends FormRequest
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
        return[
            'titolo' => 'required|min:3|max:100',
            'src' => 'required|min:3|max:255',
            'src_h' => 'max:255',
            'src_p' => 'max:255',
            'tipo' => 'required|min:2|max:20',
            'cottura' => 'required|min:2|max:20',
            'peso' => 'required|min:2|max:20',
        ];
    }

    public function messages()
    {
        return[
            'titolo.required' => 'Il titolo è un campo obbligatorio',
            'titolo.min' => 'Il titolo deve avere almeno :min caratteri',
            'titolo.max' => 'Il titolo non deve avere più di :max caratteri',
            'src.required' => 'Il path dell\'immagine 1 è un campo obbligatorio',
            'src.min' => 'Il path dell\'immagine 1 deve avere almeno :min caratteri',
            'src.max' => 'Il path dell\'immagine 1 non deve avere più di :max caratteri',
            'src_h.max' => 'Il path dell\'immagine 2 non deve avere più di :max caratteri',
            'src_p.max' => 'Il path dell\'immagine 3 non deve avere più di :max caratteri',
            'tipo.required' => 'Il tipo è un campo obbligatorio',
            'tipo.min' => 'Il tipo deve avere almeno :min caratteri',
            'tipo.max' => 'Il tipo non deve avere più di :max caratteri',
            'cottura.required' => 'La cottura è un campo obbligatorio',
            'cottura.min' => 'La cottura deve avere almeno :min caratteri',
            'cottura.max' => 'La cottura non deve avere più di :max caratteri',
            'peso.required' => 'Il peso è un campo obbligatorio',
            'peso.min' => 'Il peso deve avere almeno :min caratteri',
            'peso.max' => 'Il peso non deve avere più di :max caratteri'
        ];
    }
}
