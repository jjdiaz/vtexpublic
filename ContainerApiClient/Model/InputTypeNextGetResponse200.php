<?php

namespace Productsup\ContainerApi\Client\Model;

class InputTypeNextGetResponse200 extends \ArrayObject
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
     * @var mixed[]|null
     */
    protected $data;
    /**
     * 
     *
     * @return mixed[]|null
     */
    public function getData() : ?iterable
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param mixed[]|null $data
     *
     * @return self
     */
    public function setData(?iterable $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}