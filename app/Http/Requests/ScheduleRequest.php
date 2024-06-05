<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ScheduleRequest extends FormRequest
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
            'teacher_id' => 'required|integer',
            'course_id' => 'required|integer',
            'group_id' => 'required|integer',
            'study_plan_id' => 'required|integer',
            'academic_period_id' => 'required|integer',
            'session_dasc_id' => 'required|integer',
            'classroom_id' => 'required|integer',
            'day_id' => 'required|integer',
            'block_id' => 'required|integer',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
