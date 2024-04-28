<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordPolicyRule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Typically, implement authorisation logic here,
        // such as checking if the user is allowed to perform the action.
        // For registration requests, it's common to return true.
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
            'password' => ['required', 'string', new PasswordPolicyRule],
            // Add other validation rules for registration fields...
        ];
    }
}
