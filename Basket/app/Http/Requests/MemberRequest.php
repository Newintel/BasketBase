<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date'],
            'origin' => ['nullable', 'string', 'max:100'],
            'active' => ['nullable', 'string', 'regex:(on)'],
            'hof' => ['nullable', 'string', 'regex:(on)'],
            'dead' => ['nullable', 'string', 'regex:(on)']
        ];
    }
}
