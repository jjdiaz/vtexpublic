<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class ReadInputFileNext extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    protected $type;
    /**
     * Will return the next item from the file, if no more: no-content response.
     *
     * @param string $type 
     * @param array $queryParameters {
     *     @var bool $show-hidden Show or hide columns with double underscore in name. Hidden by default
     * }
     */
    public function __construct(string $type, array $queryParameters = array())
    {
        $this->type = $type;
        $this->queryParameters = $queryParameters;
    }
    use \Productsup\ContainerApi\Client\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{type}'), array($this->type), '/input/{type}/next');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('show-hidden'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('show-hidden', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextInternalServerErrorException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse200', 'json');
        }
        if (204 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ReadInputFileNextNotFoundException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse404', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ReadInputFileNextInternalServerErrorException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse500', 'json'), $response);
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}