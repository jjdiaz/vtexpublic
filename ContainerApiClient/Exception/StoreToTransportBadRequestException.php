<?php

namespace Productsup\ContainerApi\Client\Exception;

class StoreToTransportBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\StoreToTransportPostResponse400
     */
    private $storeToTransportPostResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\StoreToTransportPostResponse400 $storeToTransportPostResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->storeToTransportPostResponse400 = $storeToTransportPostResponse400;
        $this->response = $response;
    }
    public function getStoreToTransportPostResponse400() : \Productsup\ContainerApi\Client\Model\StoreToTransportPostResponse400
    {
        return $this->storeToTransportPostResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}