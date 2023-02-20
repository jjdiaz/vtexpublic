<?php

namespace Productsup\ContainerApi\Client\Model;

class OutputTypePostResponse400Errors extends \ArrayObject
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
    protected $data;
    /**
     * 
     *
     * @return string|null
     */
    public function getData() : ?string
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param string|null $data
     *
     * @return self
     */
    public function setData(?string $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}