<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class WriteLog extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    protected $level;
    /**
     * 
     *
     * @param string $level 
     * @param null|\Productsup\ContainerApi\Client\Model\WriteLogInput $requestBody 
     */
    public function __construct(string $level, ?\Productsup\ContainerApi\Client\Model\WriteLogInput $requestBody = null)
    {
        $this->level = $level;
        $this->body = $requestBody;
    }
    use \Productsup\ContainerApi\Client\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{level}'), array($this->level), '/logs/{level}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Productsup\ContainerApi\Client\Model\WriteLogInput) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Productsup\ContainerApi\Client\Exception\WriteLogBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\LogsLevelPostResponse201
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\LogsLevelPostResponse201', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\WriteLogBadRequestException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\LogsLevelPostResponse400', 'json'), $response);
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}