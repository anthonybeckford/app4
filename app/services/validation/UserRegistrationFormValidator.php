<?php

class UserRegistrationFormValidator extends FormValidator {
    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ];
}