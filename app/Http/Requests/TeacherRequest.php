<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TeacherRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'last_name_father' => 'required|string|max:20',
            'last_name_mother' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'email' => 'required|string|max:50|email',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:128',
            'user_id' => 'required|integer',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
