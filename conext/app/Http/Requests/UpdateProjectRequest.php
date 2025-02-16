<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'level_required' => 'integer|min:1',
                'status' => 'required|in:published,draft,archived',
            ];
        } else {
            return [
                'title' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'level_required' => 'sometimes|integer|min:1',
                'status' => 'sometimes|in:published,draft,archived',

            ];
        }
    }
}
