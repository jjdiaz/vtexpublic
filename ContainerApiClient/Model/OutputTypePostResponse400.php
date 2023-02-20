<?php

namespace Productsup\ContainerApi\Client\Model;

class OutputTypePostResponse400 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string|null
     */
    protected $message;
    /**
     * 
     *
     * @var OutputTypePostResponse400Errors|null
     */
    protected $errors;
    /**
     * 
     *
     * @return string|null
     */
    public function getMessage() : ?string
    {
        return $this->message;
    }
    /**
     * 
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message) : self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
    /**
     * 
     *
     * @return OutputTypePostResponse400Errors|null
     */
    public function getErrors() : ?OutputTypePostResponse400Errors
    {
        return $this->errors;
    }
    /**
     * 
     *
     * @param OutputTypePostResponse400Errors|null $errors
     *
     * @return self
     */
    public function setErrors(?OutputTypePostResponse400Errors $errors) : self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}