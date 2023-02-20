<?php

namespace Productsup\ContainerApi\Client\Model;

class BucketsExchangeUploadRemoteFilePutResponse400 extends \ArrayObject
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
     * @var BucketsExchangeUploadRemoteFilePutResponse400Errors|null
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
     * @return BucketsExchangeUploadRemoteFilePutResponse400Errors|null
     */
    public function getErrors() : ?BucketsExchangeUploadRemoteFilePutResponse400Errors
    {
        return $this->errors;
    }
    /**
     * 
     *
     * @param BucketsExchangeUploadRemoteFilePutResponse400Errors|null $errors
     *
     * @return self
     */
    public function setErrors(?BucketsExchangeUploadRemoteFilePutResponse400Errors $errors) : self
    {
        $this->initialized['errors'] = true;
        $this->errors = $errors;
        return $this;
    }
}