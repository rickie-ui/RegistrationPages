<?php

//validation
class UserValidation
{
    //get data
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email', 'phone', 'birth', 'password'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validateEmail();
        $this->validatePhone();
        $this->validateBirth();
        $this->validatePassword();

        return $this->errors;
    }

    private function validateUsername()
    {
        $val = trim($this->data['username']);
        if (empty($val)) {
            $this->addError('username', 'username cannot be empty');
        } else {
            if (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $val)) {
                $this->addError('username', 'username must be 6-12 characters and alphanumeric');
            }
        }
    }

    private function validateEmail()
    {
        $val = trim($this->data['email']);
        if (empty($val)) {
            $this->addError('email', 'Email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Enter a valid email');
            }
        }
    }
    private function validatePhone()
    {
        $val = trim($this->data['phone']);
        if (empty($val)) {
            $this->addError('phone', 'Phone cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_INT)) {
                $this->addError('phone', 'Enter a valid phone number');
            }
        }
    }
    private function validateBirth()
    {
        $val = trim($this->data['birth']);
        if (empty($val)) {
            $this->addError('birth', 'Birth date cannot be empty');
        }
    }

    public function validatePassword()
    {
        $pass = $this->data['password'];
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);

        if (empty($pass)) {
            $this->addError('password', 'Password cannot be empty');
        } else {
            if (!$uppercase || $lowercase || $number || $specialChars) {
                $this->addError('password', 'Password should include at least one uppercase letter, lowercase letter,number and special character.');
            }
        }
    }

    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
