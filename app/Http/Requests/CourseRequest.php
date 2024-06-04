<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseRequest extends FormRequest
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
            'major_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'area_id' => 'required|integer',
            'code' => 'required|string|min:6|max:6',
            'teoric_hours' => 'required|integer',
            'practice_hours' => 'required|integer',
            'credits' => 'required|integer',
            'character' => 'required|string|max:20',
            'study_plan_id' => 'required|integer',
            'name' => 'required|string|max:150',
            'total_hours' => 'required|integer',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
