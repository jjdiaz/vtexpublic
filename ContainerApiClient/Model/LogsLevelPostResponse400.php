<?php

namespace Productsup\ContainerApi\Client\Model;

class LogsLevelPostResponse400 extends \ArrayObject
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
     * @var LogsLevelPostResponse400Errors|null
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
     * @return LogsLevelPostResponse400Errors|null
     */
    public function getErrors() : ?LogsLevelPostResponse400Errors
    {
        return $this->errors;
    }
    /**
     * 
     *
     * @param LogsLevelPostResponse400Errors|null $errors
     *
     * @return self
     */
    public function setErrors(?LogsLevelPostResponse400Errors $errors) : self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}