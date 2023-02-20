<?php

namespace Productsup\ContainerApi\Client\Model;

class ItemsTypeCountGetResponse200 extends \ArrayObject
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
     * @var ItemsTypeCountGetResponse200Data|null
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
     * @return ItemsTypeCountGetResponse200Data|null
     */
    public function getData() : ?ItemsTypeCountGetResponse200Data
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param ItemsTypeCountGetResponse200Data|null $data
     *
     * @return self
     */
    public function setData(?ItemsTypeCountGetResponse200Data $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}