<?php

namespace Productsup\ContainerApi\Client\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Productsup\ContainerApi\Client\Runtime\Normalizer\CheckArray;
use Productsup\ContainerApi\Client\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class StoreToTransportPostResponse400ErrorsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse400Errors';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Productsup\\ContainerApi\\Client\\Model\\StoreToTransportPostResponse400Errors';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Productsup\ContainerApi\Client\Model\StoreToTransportPostResponse400Errors();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('sourceFile', $data) && $data['sourceFile'] !== null) {
            $object->setSourceFile($data['sourceFile']);
            unset($data['sourceFile']);
        }
        elseif (\array_key_exists('sourceFile', $data) && $data['sourceFile'] === null) {
            $object->setSourceFile(null);
        }
        if (\array_key_exists('remoteFile', $data) && $data['remoteFile'] !== null) {
            $object->setRemoteFile($data['remoteFile']);
            unset($data['remoteFile']);
        }
        elseif (\array_key_exists('remoteFile', $data) && $data['remoteFile'] === null) {
            $object->setRemoteFile(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('sourceFile') && null !== $object->getSourceFile()) {
            $data['sourceFile'] = $object->getSourceFile();
        }
        if ($object->isInitialized('remoteFile') && null !== $object->getRemoteFile()) {
            $data['remoteFile'] = $object->getRemoteFile();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}