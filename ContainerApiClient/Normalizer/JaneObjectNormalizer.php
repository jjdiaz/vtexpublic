<?php

namespace Productsup\ContainerApi\Client\Normalizer;

use Productsup\ContainerApi\Client\Runtime\Normalizer\CheckArray;
use Productsup\ContainerApi\Client\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = array('Productsup\\ContainerApi\\Client\\Model\\BucketExchangeUploadInput' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketExchangeUploadInputNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\WriteLogInput' => 'Productsup\\ContainerApi\\Client\\Normalizer\\WriteLogInputNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToInternalStorageInput' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToInternalStorageInputNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportInput' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToTransportInputNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\WriteToOutputFileInput' => 'Productsup\\ContainerApi\\Client\\Normalizer\\WriteToOutputFileInputNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\WriteToOutputFileInputMeta' => 'Productsup\\ContainerApi\\Client\\Normalizer\\WriteToOutputFileInputMetaNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsDeleteRemoteFileDeleteResponse202' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsDeleteRemoteFileDeleteResponse202Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsDeleteRemoteFileDeleteResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsDeleteRemoteFileDeleteResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsDeleteRemoteFileDeleteResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsDeleteRemoteFileDeleteResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeDownloadRemoteFileGetResponse202' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeDownloadRemoteFileGetResponse202Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeDownloadRemoteFileGetResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeDownloadRemoteFileGetResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeDownloadRemoteFileGetResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeDownloadRemoteFileGetResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeUploadRemoteFilePutResponse202' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeUploadRemoteFilePutResponse202Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeUploadRemoteFilePutResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeUploadRemoteFilePutResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\BucketsExchangeUploadRemoteFilePutResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\BucketsExchangeUploadRemoteFilePutResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\ItemsTypeCountGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ItemsTypeCountGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\ItemsTypeCountGetResponse200Data' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ItemsTypeCountGetResponse200DataNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\LogsLevelPostResponse201' => 'Productsup\\ContainerApi\\Client\\Normalizer\\LogsLevelPostResponse201Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\LogsLevelPostResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\LogsLevelPostResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\LogsLevelPostResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\LogsLevelPostResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\PingGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\PingGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesLogPostResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesLogPostResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesPendingGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesPendingGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesPendingGetResponse200DataItem' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesPendingGetResponse200DataItemNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesUuidGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse200Data' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesUuidGetResponse200DataNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse404' => 'Productsup\\ContainerApi\\Client\\Normalizer\\ProcessesUuidGetResponse404Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextBatchGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextBatchGetResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse404' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextBatchGetResponse404Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextBatchGetResponse500' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextBatchGetResponse500Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse200' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextGetResponse200Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse404' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextGetResponse404Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\InputTypeNextGetResponse500' => 'Productsup\\ContainerApi\\Client\\Normalizer\\InputTypeNextGetResponse500Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\StorageInternalPostResponse202' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StorageInternalPostResponse202Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\StorageInternalPostResponse202Data' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StorageInternalPostResponse202DataNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\StorageInternalPostResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StorageInternalPostResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\StorageInternalPostResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StorageInternalPostResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse202' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToTransportPostResponse202Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse202Data' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToTransportPostResponse202DataNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToTransportPostResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\StoreToTransportPostResponse400ErrorsNormalizer', 'Productsup\\ContainerApi\\Client\\Model\\OutputTypePostResponse201' => 'Productsup\\ContainerApi\\Client\\Normalizer\\OutputTypePostResponse201Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\OutputTypePostResponse400' => 'Productsup\\ContainerApi\\Client\\Normalizer\\OutputTypePostResponse400Normalizer', 'Productsup\\ContainerApi\\Client\\Model\\OutputTypePostResponse400Errors' => 'Productsup\\ContainerApi\\Client\\Normalizer\\OutputTypePostResponse400ErrorsNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\Productsup\\ContainerApi\\Client\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
}