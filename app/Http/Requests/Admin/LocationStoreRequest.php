<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>['required','string', 'max:255','unique:locations,name'],
            'show_at_home'=>['required','boolean'],
            'status'=>['required','boolean'],
        ];
    }
}
