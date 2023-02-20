<?php

namespace Productsup\ContainerApi\Client\Exception;

class ReadInputFileNextBatchNotFoundException extends NotFoundException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse404
     */
    private $inputTypeNextBatchGetResponse404;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse404 $inputTypeNextBatchGetResponse404, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Not Found');
        $this->inputTypeNextBatchGetResponse404 = $inputTypeNextBatchGetResponse404;
        $this->response = $response;
    }
    public function getInputTypeNextBatchGetResponse404() : \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse404
    {
        return $this->inputTypeNextBatchGetResponse404;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}