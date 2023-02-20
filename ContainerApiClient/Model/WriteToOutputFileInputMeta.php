<?php

namespace Productsup\ContainerApi\Client\Model;

class WriteToOutputFileInputMeta extends \ArrayObject
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
    protected $separator;
    /**
     * 
     *
     * @return string|null
     */
    public function getSeparator() : ?string
    {
        return $this->separator;
    }
    /**
     * 
     *
     * @param string|null $separator
     *
     * @return self
     */
    public function setSeparator(?string $separator) : self
    {
        $this->initialized['separator'] = true;
        $this->separator = $separator;
        return $this;
    }
}