<?php

class PasswordStrengthValidator
{
    /** @var string */
    private $password;

    /** @var int */
    private $minLength;

    /** @var bool */
    private $requireSpecialChar;

    /** @var bool */
    private $requireNumber;

    /** @var bool */
    private $requireUpperCase;

    /** @var bool */
    private $requireLowerCase;

    /**
     * @param string $password
     * @param int $minLength
     * @param bool $requireSpecialChar
     * @param bool $requireNumber
     * @param bool $requireUpperCase
     * @param bool $requireLowerCase
     */
    public function __construct(
        string $password,
        int $minLength = 6,
        bool $requireSpecialChar = true,
        bool $requireNumber = true,
        bool $requireUpperCase = true,
        bool $requireLowerCase = true
    ) {
        $this->password = $password;
        $this->minLength = $minLength;
        $this->requireSpecialChar = $requireSpecialChar;
        $this->requireNumber = $requireNumber;
        $this->requireUpperCase = $requireUpperCase;
        $this->requireLowerCase = $requireLowerCase;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        if (!$this->isLongEnough()) {
            return false;
        }

        if ($this->requireSpecialChar && !$this->hasSpecialChar()) {
            return false;
        }

        if ($this->requireNumber && !$this->hasNumber()) {
            return false;
        }

        if ($this->requireUpperCase && !$this->hasUpperCase()) {
            return false;
        }

        if ($this->requireLowerCase && !$this->hasLowerCase()) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isLongEnough(): bool
    {
        return strlen($this->password) >= $this->minLength;
    }

    /**
     * @return bool
     */
    private function hasSpecialChar(): bool
    {
        return preg_match('/[\p{P}\p{S}]/', $this->password);
    }

    /**
     * @return bool
     */
    private function hasNumber(): bool
    {
        return preg_match('/[0-9]/', $this->password);
    }

    /**
     * @return bool
     */
    private function hasUpperCase(): bool
    {
        return preg_match('/[A-Z]/', $this->password);
    }

    /**
     * @return bool
     */
    private function hasLowerCase(): bool
    {
        return preg_match('/[a-z]/', $this->password);
    }
}
