<?php

namespace Productsup\ContainerApi\Client\Model;

class ProcessesUuidGetResponse200 extends \ArrayObject
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
     * @var ProcessesUuidGetResponse200Data|null
     */
    protected $data;
    /**
     * 
     *
     * @return ProcessesUuidGetResponse200Data|null
     */
    public function getData() : ?ProcessesUuidGetResponse200Data
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param ProcessesUuidGetResponse200Data|null $data
     *
     * @return self
     */
    public function setData(?ProcessesUuidGetResponse200Data $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}