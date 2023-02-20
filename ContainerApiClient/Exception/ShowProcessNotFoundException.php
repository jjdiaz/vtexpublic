<?php

namespace Productsup\ContainerApi\Client\Exception;

class ShowProcessNotFoundException extends NotFoundException
{
    /**
     * @var \Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse404
     */
    private $processesUuidGetResponse404;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse404 $processesUuidGetResponse404, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Not Found');
        $this->processesUuidGetResponse404 = $processesUuidGetResponse404;
        $this->response = $response;
    }
    public function getProcessesUuidGetResponse404() : \Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse404
    {
        return $this->processesUuidGetResponse404;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}