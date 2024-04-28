<?php
namespace app\Rules;

use PHPUnit\Framework\TestCase;
use app\Rules\PasswordPolicyRule;

class PasswordPolicyRuleTest extends TestCase
{
    public function testValidPasswords()
    {
        $rule = new PasswordPolicyRule();

        $this->assertTrue($rule->passes('password', 'StrongPassword123'));
        $this->assertTrue($rule->passes('password', 'AnotherStrongPwd!'));
        // Add more valid password tests...
    }

    public function testInvalidPasswords()
    {
        $rule = new PasswordPolicyRule();

        $this->assertFalse($rule->passes('password', 'weakpassword')); // Too short
        $this->assertFalse($rule->passes('password', 'noSpecialChars123')); // Missing special characters
        // Add more invalid password tests...
    }

    public function testEdgeCases()
    {
        $rule = new PasswordPolicyRule();

        $this->assertTrue($rule->passes('password', str_repeat('a', 255))); // Max length
        $this->assertFalse($rule->passes('password', str_repeat('$', 8))); // Contains invalid character ($)
        // Add more edge case tests...
    }
}
