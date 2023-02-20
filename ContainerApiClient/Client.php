<?php

namespace Productsup\ContainerApi\Client;

class Client extends \Productsup\ContainerApi\Client\Runtime\Client\Client
{
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\BucketDeleteFileBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\BucketsDeleteRemoteFileDeleteResponse202|\Psr\Http\Message\ResponseInterface
     */
    public function bucketDeleteFile(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\BucketDeleteFile(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\BucketExchangeDownloadBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\BucketsExchangeDownloadRemoteFileGetResponse202|\Psr\Http\Message\ResponseInterface
     */
    public function bucketExchangeDownload(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\BucketExchangeDownload(), $fetch);
    }
    /**
     * 
     *
     * @param null|\Productsup\ContainerApi\Client\Model\BucketExchangeUploadInput $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\BucketExchangeUploadBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\BucketsExchangeUploadRemoteFilePutResponse202|\Psr\Http\Message\ResponseInterface
     */
    public function bucketExchangeUpload(?\Productsup\ContainerApi\Client\Model\BucketExchangeUploadInput $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\BucketExchangeUpload($requestBody), $fetch);
    }
    /**
     * Although this route works, it is intended to be use by a CLI command for maintenance reasons
     *
     * @param string $type 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function closeOutputFile(string $type, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\CloseOutputFile($type), $fetch);
    }
    /**
     * Will return the row count of the file.
     *
     * @param string $type 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\ItemsTypeCountGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function itemsCountInputFile(string $type, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\ItemsCountInputFile($type), $fetch);
    }
    /**
     * 
     *
     * @param string $level 
     * @param null|\Productsup\ContainerApi\Client\Model\WriteLogInput $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\WriteLogBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\LogsLevelPostResponse201|\Psr\Http\Message\ResponseInterface
     */
    public function writeLog(string $level, ?\Productsup\ContainerApi\Client\Model\WriteLogInput $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\WriteLog($level, $requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\PingGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function ping(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\Ping(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\ProcessesLogPostResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function logAllProcesses(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\LogAllProcesses(), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\ProcessesPendingGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function showPendingProcesses(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\ShowPendingProcesses(), $fetch);
    }
    /**
     * Display process details
     *
     * @param string $uuid 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\ShowProcessNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function showProcess(string $uuid, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\ShowProcess($uuid), $fetch);
    }
    /**
     * Will return the next batch of items from the file, if no more: empty response.
     *
     * @param string $type 
     * @param array $queryParameters {
     *     @var int $size Size of the batch (should be 0 < size < 1000), default 1
     *     @var bool $show-hidden Show or hide columns with double underscore in name. Hidden by default
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextBatchInternalServerErrorException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\InputTypeNextBatchGetResponse200|\Psr\Http\Message\ResponseInterface
     */
    public function readInputFileNextBatch(string $type, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\ReadInputFileNextBatch($type, $queryParameters), $fetch);
    }
    /**
     * Will return the next item from the file, if no more: no-content response.
     *
     * @param string $type 
     * @param array $queryParameters {
     *     @var bool $show-hidden Show or hide columns with double underscore in name. Hidden by default
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextNotFoundException
     * @throws \Productsup\ContainerApi\Client\Exception\ReadInputFileNextInternalServerErrorException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\InputTypeNextGetResponse200|null|\Psr\Http\Message\ResponseInterface
     */
    public function readInputFileNext(string $type, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\ReadInputFileNext($type, $queryParameters), $fetch);
    }
    /**
     * Resetting the cursor means the next item/batch will start from the beginning again
     *
     * @param string $type 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function restartCursorInputFile(string $type, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\RestartCursorInputFile($type), $fetch);
    }
    /**
     * 
     *
     * @param null|\Productsup\ContainerApi\Client\Model\StoreToInternalStorageInput $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\StoreToInternalStorageBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\StorageInternalPostResponse202|\Psr\Http\Message\ResponseInterface
     */
    public function storeToInternalStorage(?\Productsup\ContainerApi\Client\Model\StoreToInternalStorageInput $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\StoreToInternalStorage($requestBody), $fetch);
    }
    /**
     * 
     *
     * @param null|\Productsup\ContainerApi\Client\Model\StoreToTransportInput $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\StoreToTransportBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\StoreToTransportPostResponse202|\Psr\Http\Message\ResponseInterface
     */
    public function storeToTransport(?\Productsup\ContainerApi\Client\Model\StoreToTransportInput $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\StoreToTransport($requestBody), $fetch);
    }
    /**
     * 
     *
     * @param string $type 
     * @param null|\Productsup\ContainerApi\Client\Model\WriteToOutputFileInput $requestBody 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Productsup\ContainerApi\Client\Exception\WriteToOutputFileBadRequestException
     * @throws \Productsup\ContainerApi\Client\Exception\UnexpectedStatusCodeException
     *
     * @return \Productsup\ContainerApi\Client\Model\OutputTypePostResponse201|\Psr\Http\Message\ResponseInterface
     */
    public function writeToOutputFile(string $type, ?\Productsup\ContainerApi\Client\Model\WriteToOutputFileInput $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Productsup\ContainerApi\Client\Endpoint\WriteToOutputFile($type, $requestBody), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Productsup\ContainerApi\Client\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}