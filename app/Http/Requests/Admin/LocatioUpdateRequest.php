<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocatioUpdateRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'name'=>['required','string', 'max:255','unique:locations,name,'.$this->location],
            'show_at_home'=>['required','boolean'],
            'status'=>['required','boolean'],
        ];
    }
}
