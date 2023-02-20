<?php

namespace Productsup\ContainerApi\Client\Model;

class StorageInternalPostResponse400Errors extends \ArrayObject
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
     * @var string|null
     */
    protected $remoteFile;
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
    /**
     * 
     *
     * @return string|null
     */
    public function getRemoteFile() : ?string
    {
        return $this->remoteFile;
    }
    /**
     * 
     *
     * @param string|null $remoteFile
     *
     * @return self
     */
    public function setRemoteFile(?string $remoteFile) : self
    {
        $this->initialized['remoteFile'] = true;
        $this->remoteFile = $remoteFile;
        return $this;
    }
}