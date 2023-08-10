<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = $this->route('user',0);
        $id = $user ? $user->id : 0;
        return [
            'firstname' => 'sometimes|required|string',
            'lastname' => 'sometimes|required|string',
            'phone' => 'sometimes|required|string|max:12',
            'email' => "sometimes|required|unique:users,email,{$id}",
            'password' => 'sometimes|required|confirmed',
            'type' => 'nullable',
            'image' =>  'nullable',
            'status' => 'nullable',
            'email_verified_at' => 'nullable',
        ];
    }
}
