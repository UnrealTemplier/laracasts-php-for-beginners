<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    protected function __construct(
        protected readonly array $params,
    ) {
        if (!Validator::email($params['email'])) {
            $this->errors['email'] = 'Please enter a valid email address';
        }

        if (!Validator::string($params['password'], 8, 255)) {
            $this->errors['password'] = 'Please enter a valid password';
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($params)
    {
        $instance = new static($params);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw()
    {
        $old = ['email' => $this->params['email']];
        return ValidationException::throw($this->errors(), $old);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($key, $message)
    {
        $this->errors[$key] = $message;
        return $this;
    }
}
