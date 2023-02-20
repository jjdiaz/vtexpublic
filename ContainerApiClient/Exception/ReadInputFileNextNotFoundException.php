<?php

namespace Productsup\ContainerApi\Client\Exception;

class ReadInputFileNextNotFoundException extends NotFoundException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse404
     */
    private $inputTypeNextGetResponse404;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse404 $inputTypeNextGetResponse404, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Not Found');
        $this->inputTypeNextGetResponse404 = $inputTypeNextGetResponse404;
        $this->response = $response;
    }
    public function getInputTypeNextGetResponse404() : \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse404
    {
        return $this->inputTypeNextGetResponse404;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}