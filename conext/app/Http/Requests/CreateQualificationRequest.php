<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQualificationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'submission_id' => 'required|exists:submissions,id',
            'feedback' => 'required|string|max:1000',
            'exp_points' => 'required|integer|min:0',
            'skills' => 'required|array',
            'skills.*.id' => 'integer|exists:skills,id',
            'skills.*.points' => 'integer|min:0'
        ];
    }
}
