<?php


// ADMIN
class Admins extends Model
{

	protected $table = 'admins';

	public function validateLogin($data)
    {
        $this->errors = [];

        if (empty($data['fill-up'])) {
            $this->errors['fill-up'] = "username is required";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }

        return empty($this->errors);
    }

	public function getErrors()
    {
        return $this->errors;
    }
}