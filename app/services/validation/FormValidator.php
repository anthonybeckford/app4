<?php

abstract class FormValidator
{
    protected $rules;

    public function validate(array $data, array $messages = [])
    {
        return \Validator::make(
            $data,
            $this->rules,
            $messages
        );
    }
}