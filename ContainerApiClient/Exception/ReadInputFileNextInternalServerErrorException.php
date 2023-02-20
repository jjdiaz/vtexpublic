<?php

namespace Productsup\ContainerApi\Client\Exception;

class ReadInputFileNextInternalServerErrorException extends InternalServerErrorException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse500
     */
    private $inputTypeNextGetResponse500;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse500 $inputTypeNextGetResponse500, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Internal Server Error');
        $this->inputTypeNextGetResponse500 = $inputTypeNextGetResponse500;
        $this->response = $response;
    }
    public function getInputTypeNextGetResponse500() : \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse500
    {
        return $this->inputTypeNextGetResponse500;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}