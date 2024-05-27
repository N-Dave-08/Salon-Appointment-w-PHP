<?php

// User
class User extends Model
{
    protected $table = 'users';
    public $errors = [];

    public function validate($data)
    {
        $this->errors = [];

        $row = $this->where(['email' => $data['email']]);
        if (!empty($row)) {
            $this->errors['email'] = "Email is already taken";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        }

        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }

        if ($data['password'] !== $data['conpass']) {
            $this->errors['conpass'] = "Passwords do not match";
        }

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = "First name is required";
        }
        if (empty($data['lastname'])) {
            $this->errors['lastname'] = "Last name is required";
        }
        if (empty($data['number'])) {
            $this->errors['number'] = "Phone number is required";
        }

        return empty($this->errors);
    }

    public function validateLogin($data)
    {
        $this->errors = [];

        if (empty($data['fill-up'])) {
            $this->errors['fill-up'] = "Email or phone number is required";
        }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }

        return empty($this->errors);
    }

    public function validatePasswordStrength($password)
    {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        return preg_match($pattern, $password);
    }
    
    public function getErrors()
    {
        return $this->errors;
    }

    public function remove($id, $id_column = 'id')
    {
        $ratingModel = new Reviews();
        $ratingModel->removeByUserId($id);

        parent::delete($id, $id_column);
    }
}
