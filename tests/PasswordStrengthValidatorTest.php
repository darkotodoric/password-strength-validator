<?php

use PHPUnit\Framework\TestCase;

final class PasswordStrengthValidatorTest extends TestCase
{
    public function testCases()
    {
        $password = 'darkoTODORIC123@';
        $passwordStrengthValidator = new PasswordStrengthValidator($password);
        $this->assertTrue($passwordStrengthValidator->isValid());

        $password = 'darkoTODORIC123@';
        $passwordStrengthValidator = new PasswordStrengthValidator($password, 32);
        $this->assertFalse($passwordStrengthValidator->isValid());

        $password = 'darkoTODORIC123';
        $passwordStrengthValidator = new PasswordStrengthValidator($password, 8, false);
        $this->assertTrue($passwordStrengthValidator->isValid());

        $password = 'darkoTODORIC';
        $passwordStrengthValidator = new PasswordStrengthValidator($password, 8, false, false);
        $this->assertTrue($passwordStrengthValidator->isValid());

        $password = 'darkotodoric';
        $passwordStrengthValidator = new PasswordStrengthValidator($password, 8, false, false, false);
        $this->assertTrue($passwordStrengthValidator->isValid());

        $password = '12345678';
        $passwordStrengthValidator = new PasswordStrengthValidator($password, 8, false, false, false, false);
        $this->assertTrue($passwordStrengthValidator->isValid());
    }
}
