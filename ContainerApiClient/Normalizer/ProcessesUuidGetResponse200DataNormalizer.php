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
class ProcessesUuidGetResponse200DataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse200Data';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Productsup\\ContainerApi\\Client\\Model\\ProcessesUuidGetResponse200Data';
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
        $object = new \Productsup\ContainerApi\Client\Model\ProcessesUuidGetResponse200Data();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
            unset($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
            unset($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('exit-code', $data) && $data['exit-code'] !== null) {
            $object->setExitCode($data['exit-code']);
            unset($data['exit-code']);
        }
        elseif (\array_key_exists('exit-code', $data) && $data['exit-code'] === null) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('seconds-remaining', $data) && $data['seconds-remaining'] !== null) {
            $object->setSecondsRemaining($data['seconds-remaining']);
            unset($data['seconds-remaining']);
        }
        elseif (\array_key_exists('seconds-remaining', $data) && $data['seconds-remaining'] === null) {
            $object->setSecondsRemaining(null);
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
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if ($object->isInitialized('exitCode') && null !== $object->getExitCode()) {
            $data['exit-code'] = $object->getExitCode();
        }
        if ($object->isInitialized('secondsRemaining') && null !== $object->getSecondsRemaining()) {
            $data['seconds-remaining'] = $object->getSecondsRemaining();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}