<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQualificationRequest extends FormRequest
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
        $metodo = $this->method();
        if ($metodo == 'PUT') {
            return [
                'feedback' => 'required|string|max:1000',
                'exp_points' => 'required|integer|min:0',
                'skills' => 'required|array',
                'skills.*.id' => 'integer|exists:skills,id',
                'skills.*.points' => 'integer|min:0'
            ];
        } else {
            return [
                'feedback' => 'sometimes|string|max:1000',
                'exp_points' => 'sometimes|integer|min:0',
                'skills' => 'sometimes|array',
                'skills.*.id' => 'nullable|integer|exists:skills,id',
                'skills.*.points' => 'nullable|integer|min:0'
            ];
        }
    }
}
