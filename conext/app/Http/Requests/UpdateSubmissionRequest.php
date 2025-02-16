<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmissionRequest extends FormRequest
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
                'solution_text' => 'nullable|string',
                'solution_path' => 'nullable|file|mimes:jpg,png,pdf,docx',
                'submitted_at' => 'nullable|date',
                'status' => 'nullable|in:pending,approved,rejected',
            ];
        } else {
            return [
                'solution_text' => 'sometimes|nullable|string',
                'solution_path' => 'sometimes|nullable|file|mimes:jpg,png,pdf,docx',
                'submitted_at' => 'sometimes|nullable|date',
                'status' => 'sometimes|nullable|in:pending,approved,rejected',
            ];
        }
    }
}
