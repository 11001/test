<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'firstname' => 'required|string',
            'lastname' => 'required|integer',
            'email' => 'required|email|unique',
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
