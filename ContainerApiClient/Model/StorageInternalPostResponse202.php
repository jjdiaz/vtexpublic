<?php

namespace Productsup\ContainerApi\Client\Model;

class StorageInternalPostResponse202 extends \ArrayObject
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
     * @var StorageInternalPostResponse202Data|null
     */
    protected $data;
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
     * @return StorageInternalPostResponse202Data|null
     */
    public function getData() : ?StorageInternalPostResponse202Data
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param StorageInternalPostResponse202Data|null $data
     *
     * @return self
     */
    public function setData(?StorageInternalPostResponse202Data $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}