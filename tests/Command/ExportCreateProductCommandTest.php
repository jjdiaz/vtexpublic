<?php

namespace App\Tests\Command;

use App\Command\ExportCreateProductsCommand;
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

class ExportCreateProductCommandTest extends KernelTestCase
{
    private MockHandler $handler;
    private array $guzzleHistory = [];

    public function testImport()
    {
        self::bootKernel();
        $container = static::getContainer();

        $containerApiMock = $container->get(MockContainerApi::class);

        $this->buildMockClient($container);
        $uriHost = $_ENV['VTEX_ENVIROMENT'].".".$_ENV['VTEX_ACCOUNT_NAME'];
//        $uriPath = sprintf("/%s.%s/api/catalog/pvt/product",
//            $_ENV['VTEX_ACCOUNT_NAME'],
//            $_ENV['VTEX_ENVIROMENT'],
//        );
        $uriPath = '/api/catalog/pvt/product';
        $apiKey = $_ENV['VTEX_APP_KEY'];
        $apiToken = $_ENV['VTEX_APP_TOKEN'];

        $calls = [
            [
                'expected_request' => [
                    'uri_host' => $uriHost,
                    'uri_path' => $uriPath,
                    'method' => 'POST',
                    'body' => [
                        'Name'=> 'Test Product 1',
                        'CategoryPath'=> 'Agribusiness/Agridulce',
                        'BrandName'=> 'Nike',
                        'RefId'=> 'test1',
                        'Title'=> 'Test Product 1',
                        'LinkId'=> 'test-product-1',
                        'Description'=> 'Test 1 Description',
                        'ReleaseDate'=> '2022-01-01T00:00:00',
                        'IsVisible'=> true,
                        'IsActive'=> true,
                        'TaxCode'=> '',
                        'MetaTagDescription'=> 'Test1 product meta description',
                        'ShowWithoutStock'=> true,
                        'Score'=> 1
                    ],
                    'headers'=> [
                        'X-VTEX-API-AppKey' => $apiKey,
                        'X-VTEX-API-AppToken' => $apiToken,
                    ]
                ],
                'response' => new Response(200)
            ],
            [
                'expected_request' => [
                    'uri_host' => $uriHost,
                    'uri_path' => $uriPath,
                    'method' => 'POST',
                    'body' => [
                        'Name'=> 'Test Product 2',
                        'CategoryPath'=> 'Agribusiness/Agridulce',
                        'BrandName'=> 'Nike',
                        'RefId'=> 'test2',
                        'Title'=> 'Test Product 2',
                        'LinkId'=> 'test-product-2',
                        'Description'=> 'Test 2 Description',
                        'ReleaseDate'=> '2022-01-01T00:00:00',
                        'IsVisible'=> true,
                        'IsActive'=> true,
                        'TaxCode'=> '',
                        'MetaTagDescription'=> 'Test2 product meta description',
                        'ShowWithoutStock'=> true,
                        'Score'=> 1
                    ],
                    'headers'=> [
                        'X-VTEX-API-AppKey' => $apiKey,
                        'X-VTEX-API-AppToken' => $apiToken,
                    ]
                ],
                'response' => new Response(200)
            ],
        ];

        $this->appendCalls($calls);

        $containerApiMock->appendToInput([
            'Name'=> 'Test Product 1',
            'CategoryPath'=> 'Agribusiness/Agridulce',
            'BrandName'=> 'Nike',
            'RefId'=> 'test1',
            'Title'=> 'Test Product 1',
            'LinkId'=> 'test-product-1',
            'Description'=> 'Test 1 Description',
            'ReleaseDate'=> '2022-01-01T00:00:00',
            'IsVisible'=> true,
            'IsActive'=> true,
            'TaxCode'=> '',
            'MetaTagDescription'=> 'Test1 product meta description',
            'ShowWithoutStock'=> true,
            'Score'=> 1        ]);
        $containerApiMock->appendToInput([
            'Name'=> 'Test Product 2',
            'CategoryPath'=> 'Agribusiness/Agridulce',
            'BrandName'=> 'Nike',
            'RefId'=> 'test2',
            'Title'=> 'Test Product 2',
            'LinkId'=> 'test-product-2',
            'Description'=> 'Test 2 Description',
            'ReleaseDate'=> '2022-01-01T00:00:00',
            'IsVisible'=> true,
            'IsActive'=> true,
            'TaxCode'=> '',
            'MetaTagDescription'=> 'Test2 product meta description',
            'ShowWithoutStock'=> true,
            'Score'=> 1
        ]);

        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Starting export of the marketplaces products for '.$_ENV['VTEX_ACCOUNT_NAME']);
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting Product RefId = test1');
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_NOTICE, 'Exporting Product RefId = test2');
        $containerApiMock->addExpectedLog(ContainerApiInterface::LOG_LEVEL_SUCCESS, 'Finished export');

        $commandTester = new CommandTester($container->get(ExportCreateProductsCommand::class));
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