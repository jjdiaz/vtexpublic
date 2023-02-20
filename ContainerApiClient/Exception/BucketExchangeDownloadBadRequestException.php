<?php

namespace Productsup\ContainerApi\Client\Exception;

class BucketExchangeDownloadBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\BucketsExchangeDownloadRemoteFileGetResponse400
     */
    private $bucketsExchangeDownloadRemoteFileGetResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\BucketsExchangeDownloadRemoteFileGetResponse400 $bucketsExchangeDownloadRemoteFileGetResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->bucketsExchangeDownloadRemoteFileGetResponse400 = $bucketsExchangeDownloadRemoteFileGetResponse400;
        $this->response = $response;
    }
    public function getBucketsExchangeDownloadRemoteFileGetResponse400() : \Productsup\ContainerApi\Client\Model\BucketsExchangeDownloadRemoteFileGetResponse400
    {
        return $this->bucketsExchangeDownloadRemoteFileGetResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}