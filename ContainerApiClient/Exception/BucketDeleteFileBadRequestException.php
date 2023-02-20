<?php

namespace Productsup\ContainerApi\Client\Exception;

class BucketDeleteFileBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\BucketsDeleteRemoteFileDeleteResponse400
     */
    private $bucketsDeleteRemoteFileDeleteResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\BucketsDeleteRemoteFileDeleteResponse400 $bucketsDeleteRemoteFileDeleteResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->bucketsDeleteRemoteFileDeleteResponse400 = $bucketsDeleteRemoteFileDeleteResponse400;
        $this->response = $response;
    }
    public function getBucketsDeleteRemoteFileDeleteResponse400() : \Productsup\ContainerApi\Client\Model\BucketsDeleteRemoteFileDeleteResponse400
    {
        return $this->bucketsDeleteRemoteFileDeleteResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}