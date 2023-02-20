<?php

namespace Productsup\ContainerApi\Client\Model;

class BucketExchangeUploadInput extends \ArrayObject
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
    protected $sourceFile;
    /**
     * 
     *
     * @return string|null
     */
    public function getSourceFile() : ?string
    {
        return $this->sourceFile;
    }
    /**
     * 
     *
     * @param string|null $sourceFile
     *
     * @return self
     */
    public function setSourceFile(?string $sourceFile) : self
    {
        $this->initialized['sourceFile'] = true;
        $this->sourceFile = $sourceFile;
        return $this;
    }
}