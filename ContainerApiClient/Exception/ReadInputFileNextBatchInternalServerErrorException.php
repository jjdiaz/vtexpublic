<?php

namespace Productsup\ContainerApi\Client\Exception;

class ReadInputFileNextBatchInternalServerErrorException extends InternalServerErrorException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse500
     */
    private $inputTypeNextBatchGetResponse500;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse500 $inputTypeNextBatchGetResponse500, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Internal Server Error');
        $this->inputTypeNextBatchGetResponse500 = $inputTypeNextBatchGetResponse500;
        $this->response = $response;
    }
    public function getInputTypeNextBatchGetResponse500() : \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse500
    {
        return $this->inputTypeNextBatchGetResponse500;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}