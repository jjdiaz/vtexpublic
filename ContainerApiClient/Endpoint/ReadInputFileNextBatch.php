<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class ReadInputFileNextBatch extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    protected $type;
    /**
     * Will return the next batch of items from the file, if no more: empty response.
     *
     * @param string $type 
     * @param array $queryParameters {
     *     @var int $size Size of the batch (should be 0 < size < 1000), default 1
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
        return str_replace(array('{type}'), array($this->type), '/input/{type}/next_batch');
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
        $optionsResolver->setDefined(array('size', 'show-hidden'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('size', array('int'));
        $optionsResolver->addAllowedTypes('show-hidden', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchInternalServerErrorException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse200', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchBadRequestException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse400', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchNotFoundException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse404', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchInternalServerErrorException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse500', 'json'), $response);
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}