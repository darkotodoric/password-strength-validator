# Password Strength Validator

![Packagist License](https://img.shields.io/packagist/l/darkotodoric/password-strength-validator)
![Packagist Version](https://img.shields.io/packagist/v/darkotodoric/password-strength-validator)

A lightweight PHP library for checking password strength

## Installation

Install the latest version with:

```bash
$ composer require darkotodoric/password-strength-validator
```

## Usage

```php
<?php

require_once 'vendor/autoload.php';

$password = 'darkoTODORIC123@';
$passwordStrengthValidator = new PasswordStrengthValidator($password);

if($passwordStrengthValidator->isValid()){
    // message here
}
```

## Parameters

The class constructor for `PasswordStrengthValidator` accepts the following parameters:

- `password` (string, required): The password string to be evaluated for strength.
- `minLength` (int, optional, default: 6): Specifies the minimum required length for the password.
- `requireSpecialChar` (bool, optional, default: true): Indicates whether the password must contain at least one special
  character.
- `requireNumber` (bool, optional, default: true): Specifies whether the password must contain at least one numeric
  digit.
- `requireUpperCase` (bool, optional, default: true): Determines whether the password must include at least one
  uppercase letter.
- `requireLowerCase` (bool, optional, default: true): Specifies whether the password must include at least one lowercase
  letter.

## Contributing

Contributions are welcome! Feel free to open issues or submit pull requests to improve this project.
