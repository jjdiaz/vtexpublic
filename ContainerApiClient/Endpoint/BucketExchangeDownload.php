<?php

namespace Productsup\ContainerApi\Client\Endpoint;

class BucketExchangeDownload extends \Productsup\ContainerApi\Client\Runtime\Client\BaseEndpoint implements \Productsup\ContainerApi\Client\Runtime\Client\Endpoint
{
    use \Productsup\ContainerApi\Client\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/buckets/exchange/download/{remoteFile}';
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
     * @throws \Productsup\ContainerApi\Client\Exception\BucketExchangeDownloadBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\BucketsExchangeDownloadRemoteFileGetResponse202
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (202 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeDownloadRemoteFileGetResponse202', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Productsup\ContainerApi\Client\Exception\BucketExchangeDownloadBadRequestException($serializer->deserialize($body, 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeDownloadRemoteFileGetResponse400', 'json'), $response);
        }
        throw new \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException($status, $body);
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}