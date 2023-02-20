<?php

namespace Productsup\ContainerApi\Client\Model;

class StoreToTransportPostResponse202 extends \ArrayObject
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
     * @var StoreToTransportPostResponse202Data|null
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
     * @return StoreToTransportPostResponse202Data|null
     */
    public function getData() : ?StoreToTransportPostResponse202Data
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param StoreToTransportPostResponse202Data|null $data
     *
     * @return self
     */
    public function setData(?StoreToTransportPostResponse202Data $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}