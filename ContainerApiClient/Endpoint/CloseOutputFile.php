<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class CloseOutputFile extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    protected $type;
    /**
     * Although this route works, it is intended to be use by a CLI command for maintenance reasons
     *
     * @param string $type 
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }
    use \Productsup\ContainerApi\Client\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{type}'), array($this->type), '/output/{type}/close');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}