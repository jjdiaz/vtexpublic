<?php

namespace App\Tests\Command;

use App\Command\ExportFulfillmentOrderCommand;
use App\ContainerApi\ContainerApiInterface;
use App\Tests\Mocks\MockContainerApi;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ExportFulfillmentOrderCommandTest extends KernelTestCase
{
    private MockHandler $handler;
    private array $guzzleHistory = [];

    public function testImport()
    {
        self::bootKernel();
        $container = static::getContainer();

        $containerApiMock = $container->get(MockContainerApi::class);

        $this->buildMockClient($container);
        $calls = [
            [
                'expected_request' => [
                    'uri_host' => 'developers.vtex.com',
                    'uri_path' => '/test-account.test-env.com.br/api/fulfillment/pvt/orders',
                    'method' => 'POST',
                    'body' => [
                        'marketplaceOrderId' => '1',
                        'items' =>[
                            [
                                'id' => '31',
                                'quantity' => '1',
                            ],
                            [
                                'id' => '32',
                                'quantity' => '1',
                            ],
                        ]
                    ],
                    'headers'=> [
                        'X-VTEX-API-AppKey' => 'test-key',
                        'X-VTEX-API-AppToken' => 'test-token',
                    ]
                ],
                'response' => new Response(200)
            ],
            [
                'expected_request' => [
                    'uri_host' => 'developers.vtex.com',
                    'uri_path' => '/test-account.test-env.com.br/api/fulfillment/pvt/orders',
                    'method' => 'POST',
                    'body' => [
                        'marketplaceOrderId' => '2',
                        'items' =>[
                            [
                                'id' => '31',
                                'quantity' => '1',
                            ],
                        ]
                    ],
                    'headers'=> [
                        'X-VTEX-API-AppKey' => 'test-key',
                        'X-VTEX-API-AppToken' => 'test-token',
                    ]
                ],
                'response' => new Response(200)
            ],
        ];

        $this->appendCalls($calls);

        $containerApiMock->appendToInput([
            'marketplaceOrderId' => '1',
            'items.id' => '31',
            'items.quantity' => '1'
        ]);
        $containerApiMock->appendToInput([
            'marketplaceOrderId' => '1',
            'items.id' => '32',
            'items.quantity' => '1'
        ]);
        $containerApiMock->appendToInput([
            'marketplaceOrderId' => '2',
            'items.id' => '31',
            'items.quantity' => '1'
        ]);

        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Starting export of the marketplaces orders for test-account');
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting markerOrderId = 1');
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting markerOrderId = 2');
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_SUCCESS, 'Finished export');

        $commandTester = new CommandTester($container->get(ExportFulfillmentOrderCommand::class));
        $returnCode = $commandTester->execute([]);

        $this->assertSame(0, $returnCode);
        $this->assertSame($containerApiMock->getExpectedLogs(), $containerApiMock->getLogs());
        $this->checkCalls($calls);
    }

    // -- HELPER METHODS --
    // Should be extracted to a separate unit

    private function checkCalls(array $calls = []): void
    {
        foreach ($calls as $i => $call) {
            if (empty($call['expected_request'])) {
                continue;
            }
            /** @var Request $request */
            $request = $this->guzzleHistory[$i]['request'];

            if (!empty($call['expected_request']['uri_path'])) {
                $actualPath = $request->getUri()->getPath();
                $this->assertEquals($call['expected_request']['uri_path'], $actualPath);
            }

            if (!empty($call['expected_request']['uri_host'])) {
                $actualHost = $request->getUri()->getHost();
                $this->assertEquals($call['expected_request']['uri_host'], $actualHost);
            }

            if (!empty($call['expected_request']['query'])) {
                /** @var Uri $uri */
                $uri = $request->getUri();
                parse_str($uri->getQuery(), $actualQuery);
                foreach ($call['expected_request']['query'] as $key => $value) {
                    $this->assertEquals($value, $actualQuery[$key]);
                }
            }

            if (!empty($call['expected_request']['body'])) {
                $actualBody = (string)$request->getBody();
                $expectedBody = $call['expected_request']['body'];
                if (is_string($expectedBody)) {
                    $this->assertEquals($expectedBody, $actualBody);
                }
                if (is_array($expectedBody)) {
                    $this->assertEquals($expectedBody, json_decode($actualBody, true, 512, JSON_THROW_ON_ERROR));
                }
            }

            if (!empty($call['expected_request']['headers'])) {
                $expectedHeaders = $call['expected_request']['headers'];
                $actualHeaders = $request->getHeaders();
                foreach ($expectedHeaders as $headerName => $expectedHeader) {
                    $this->assertArrayHasKey($headerName, $actualHeaders);
                    $this->assertContains($expectedHeader, $actualHeaders[$headerName]);
                }
            }

            if (!empty($call['expected_request']['method'])) {
                $this->assertEquals($call['expected_request']['method'], $request->getMethod());
            }
        }
    }

    private function appendCalls(array $calls = []): void
    {
        $this->appendResponses(array_map(static fn (array $call) => $call['response'], $calls));
    }

    private function appendResponses(array $responses = []): void
    {
        $this->handler->append(...$responses);
    }

    private function buildMockClient($container): void
    {
        $history = Middleware::history($this->guzzleHistory);
        $this->handler = new MockHandler();

        $stack = HandlerStack::create($this->handler);
        $stack->push($history);

        $container->set(HandlerStack::class, $stack);
    }

}