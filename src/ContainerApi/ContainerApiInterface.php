<?php

namespace App\ContainerApi;

use Productsup\ContainerApi\Client\Client;
use Productsup\ContainerApi\Client\Exception\ApiException;
use Productsup\ContainerApi\Client\Model\WriteLogInput;
use Productsup\ContainerApi\Client\Model\WriteToOutputFileInput;

interface ContainerApiInterface
{
    public const LOG_LEVEL_DEBUG = 'debug';
    public const LOG_LEVEL_INFO = 'info';
    public const LOG_LEVEL_NOTICE = 'notice';
    public const LOG_LEVEL_WARNING = 'warning';
    public const LOG_LEVEL_ERROR = 'error';
    public const LOG_LEVEL_SUCCESS = 'success';
    public const LOG_LEVEL_REPORT = 'report';

    public function writeToFeedbackFile(array $feedback): void;

    public function readFromInput(): array;

    public function writeToOutputFile(array $product): void;

    public function log(string $level, string $message): void;
}