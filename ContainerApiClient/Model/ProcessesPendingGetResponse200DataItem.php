<?php

namespace Productsup\ContainerApi\Client\Model;

class ProcessesPendingGetResponse200DataItem extends \ArrayObject
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
    protected $id;
    /**
     * 
     *
     * @var string|null
     */
    protected $status;
    /**
     * 
     *
     * @var int|null
     */
    protected $exitCode;
    /**
     * 
     *
     * @var int|null
     */
    protected $secondsRemaining;
    /**
     * 
     *
     * @return string|null
     */
    public function getId() : ?string
    {
        return $this->id;
    }
    /**
     * 
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id) : self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getStatus() : ?string
    {
        return $this->status;
    }
    /**
     * 
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status) : self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getExitCode() : ?int
    {
        return $this->exitCode;
    }
    /**
     * 
     *
     * @param int|null $exitCode
     *
     * @return self
     */
    public function setExitCode(?int $exitCode) : self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getSecondsRemaining() : ?int
    {
        return $this->secondsRemaining;
    }
    /**
     * 
     *
     * @param int|null $secondsRemaining
     *
     * @return self
     */
    public function setSecondsRemaining(?int $secondsRemaining) : self
    {
        $this->initialized['secondsRemaining'] = true;
        $this->secondsRemaining = $secondsRemaining;
        return $this;
    }
}