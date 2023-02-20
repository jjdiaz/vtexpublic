<?php

namespace Productsup\ContainerApi\Client\Exception;

class StoreToInternalStorageBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\StorageInternalPostResponse400
     */
    private $storageInternalPostResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\StorageInternalPostResponse400 $storageInternalPostResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->storageInternalPostResponse400 = $storageInternalPostResponse400;
        $this->response = $response;
    }
    public function getStorageInternalPostResponse400() : \Productsup\ContainerApi\Client\Model\StorageInternalPostResponse400
    {
        return $this->storageInternalPostResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}