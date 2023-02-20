<?php

namespace Productsup\ContainerApi\Client\Model;

class WriteLogInput extends \ArrayObject
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
     * @var mixed[]|null
     */
    protected $context;
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
     * @return mixed[]|null
     */
    public function getContext() : ?iterable
    {
        return $this->context;
    }
    /**
     * 
     *
     * @param mixed[]|null $context
     *
     * @return self
     */
    public function setContext(?iterable $context) : self
    {
        $this->initialized['context'] = true;
        $this->context = $context;
        return $this;
    }
}