<?php namespace Acme\Validation;

class ValidationException extends \Exception {

    protected $errors;

    /**
     * @param string $errors
     */
    function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }


} 