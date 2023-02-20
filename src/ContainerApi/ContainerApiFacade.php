<?php

namespace App\ContainerApi;

use Productsup\CDE\ContainerApi\Exception\ApiFailureException;
use Productsup\ContainerApi\Client\Client;
use Productsup\ContainerApi\Client\Exception\ApiException;
use Productsup\ContainerApi\Client\Model\WriteLogInput;
use Productsup\ContainerApi\Client\Model\WriteToOutputFileInput;

class ContainerApiFacade implements ContainerApiInterface
{
    public function __construct(
        private Client $client
    )
    {
    }

    public function writeToOutputFile(array $products): void
    {
        $this->writeManyToOutputFile('output', $products);
    }

    public function log(string $level, string $message): void
    {
        $body = new WriteLogInput();
        $body->setMessage($message);
        $body->setContext([]);

        try {
            $this->client->writeLog($level, $body);
        } catch (ApiException $exception) {
            throw new \Exception();
        }
    }

    public function readFromInput(): array
    {
        $response = $this->client->readInputFileNext('full');

        if($response === null)
            return [];

        return (array)$response->getData();
    }

    public function writeToFeedbackFile(array $feedback): void
    {
        $this->writeManyToOutputFile('feedback', [$feedback]);
    }

    private function writeManyToOutputFile(string $output, array $items): void
    {
        $body = new WriteToOutputFileInput();
        $body->setData($items);

        try {
            $this->client->writeToOutputFile($output, $body);
        } catch (ApiException $exception) {
            throw new \Exception();
        }
    }
}