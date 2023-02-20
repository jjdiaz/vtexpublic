<?php

namespace Productsup\ContainerApi\Client\Exception;

class WriteToOutputFileBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\OutputTypePostResponse400
     */
    private $outputTypePostResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\OutputTypePostResponse400 $outputTypePostResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->outputTypePostResponse400 = $outputTypePostResponse400;
        $this->response = $response;
    }
    public function getOutputTypePostResponse400() : \Productsup\ContainerApi\Client\Model\OutputTypePostResponse400
    {
        return $this->outputTypePostResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}