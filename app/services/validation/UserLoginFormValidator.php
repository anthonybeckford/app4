<?php

class UserLoginFormValidator extends FormValidator {
    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6'
    ];
}