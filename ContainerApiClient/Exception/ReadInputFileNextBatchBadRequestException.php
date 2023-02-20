<?php

namespace Productsup\ContainerApi\Client\Exception;

class ReadInputFileNextBatchBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse400
     */
    private $inputTypeNextBatchGetResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse400 $inputTypeNextBatchGetResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->inputTypeNextBatchGetResponse400 = $inputTypeNextBatchGetResponse400;
        $this->response = $response;
    }
    public function getInputTypeNextBatchGetResponse400() : \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse400
    {
        return $this->inputTypeNextBatchGetResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}