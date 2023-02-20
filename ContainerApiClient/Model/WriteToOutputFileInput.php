<?php

namespace Productsup\ContainerApi\Client\Model;

class WriteToOutputFileInput extends \ArrayObject
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
     * @var WriteToOutputFileInputMeta|null
     */
    protected $meta;
    /**
     * 
     *
     * @var mixed[][]|null
     */
    protected $data;
    /**
     * 
     *
     * @return WriteToOutputFileInputMeta|null
     */
    public function getMeta() : ?WriteToOutputFileInputMeta
    {
        return $this->meta;
    }
    /**
     * 
     *
     * @param WriteToOutputFileInputMeta|null $meta
     *
     * @return self
     */
    public function setMeta(?WriteToOutputFileInputMeta $meta) : self
    {
        $this->initialized['meta'] = true;
        $this->meta = $meta;
        return $this;
    }
    /**
     * 
     *
     * @return mixed[][]|null
     */
    public function getData() : ?array
    {
        return $this->data;
    }
    /**
     * 
     *
     * @param mixed[][]|null $data
     *
     * @return self
     */
    public function setData(?array $data) : self
    {
        $this->initialized['data'] = true;
        $this->data = $data;
        return $this;
    }
}