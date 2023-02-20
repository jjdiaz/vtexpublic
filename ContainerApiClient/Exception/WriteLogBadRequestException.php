<?php

namespace Productsup\ContainerApi\Client\Exception;

class WriteLogBadRequestException extends BadRequestException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\LogsLevelPostResponse400
     */
    private $logsLevelPostResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\LogsLevelPostResponse400 $logsLevelPostResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad Request');
        $this->logsLevelPostResponse400 = $logsLevelPostResponse400;
        $this->response = $response;
    }
    public function getLogsLevelPostResponse400() : \Productsup\ContainerApi\Client\Model\LogsLevelPostResponse400
    {
        return $this->logsLevelPostResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}