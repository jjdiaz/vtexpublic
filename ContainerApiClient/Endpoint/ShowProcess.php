<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class ShowProcess extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    protected $uuid;
    /**
     * Display process details
     *
     * @param string $uuid 
     */
    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }
    use \Productsup\ContainerApi\Client\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{uuid}'), array($this->uuid), '/processes/{uuid}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Productsup\ContainerApi\Client\Exception\ShowProcessNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse200', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ShowProcessNotFoundException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse404', 'json'), $response);
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}