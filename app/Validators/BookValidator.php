<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BookValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required|string|alpha',
            'year' => 'required|integer',
            'author' => 'required|string|alpha',
            'genre' => 'required|string|alpha',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required|string|alpha',
            'year' => 'required|integer',
            'author' => 'required|string|alpha',
            'genre' => 'required|string|alpha',],
   ];
}
