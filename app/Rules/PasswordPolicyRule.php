<?php

namespace app\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordPolicyRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Define password policy requirements here
        $minLength = 8;
        $hasUpperCase = preg_match('/[A-Z]/', $value);
        $hasLowerCase = preg_match('/[a-z]/', $value);
        $hasNumber = preg_match('/[0-9]/', $value);

        return strlen($value) >= $minLength && $hasUpperCase && $hasLowerCase && $hasNumber;
    }

    public function message()
    {
        return 'The password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.';
    }
}
