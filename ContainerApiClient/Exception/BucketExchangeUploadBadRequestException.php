<?php

namespace Productsup\ContainerApi\Client\Exception;

class BucketExchangeUploadBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\BucketsExchangeUploadRemoteFilePutResponse400
     */
    private $bucketsExchangeUploadRemoteFilePutResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\BucketsExchangeUploadRemoteFilePutResponse400 $bucketsExchangeUploadRemoteFilePutResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->bucketsExchangeUploadRemoteFilePutResponse400 = $bucketsExchangeUploadRemoteFilePutResponse400;
        $this->response = $response;
    }
    public function getBucketsExchangeUploadRemoteFilePutResponse400() : \Productsup\ContainerApi\Client\Model\BucketsExchangeUploadRemoteFilePutResponse400
    {
        return $this->bucketsExchangeUploadRemoteFilePutResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}