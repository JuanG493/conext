<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'username' => 'nullable|string|max:255|unique:users,username',
                'email' => 'required|email|max:255|unique:users,email',
                'phone_number' => 'nullable|string|max:20',
                'phone_visibility' => 'nullable|boolean',
                'website' => 'nullable|string|max:200|url',
                'website_visibility' => 'nullable|boolean',
                'password' => 'required|string|min:8',
                'profile_picture' => 'nullable|string',
            ];
        } else {
            return [
                'name' => 'sometimes|string|max:255',
                'last_name' => 'sometimes|string|max:255',
                'username' => 'sometimes|string|max:255|unique:users,username',
                'email' => 'sometimes|email|max:255|unique:users,email',
                'phone_number' => 'sometimes|string|max:20',
                'phone_visibility' => 'sometimes|boolean',
                'website' => 'sometimes|string|max:200|url',
                'website_visibility' => 'sometimes|boolean',
                'password' => 'sometimes|string|min:8',
                'profile_picture' => 'sometimes|string',

            ];
        }
    }
}
