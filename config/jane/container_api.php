<?php

return [
    'openapi-file' => __DIR__ . '/container-api.json',
    'namespace' => 'Productsup\ContainerApi\Client',
    'directory' => __DIR__ . '/../../ContainerApiClient',
    'strict' => false,
    'use-fixer' => true,
    'fixer-config-file' => __DIR__ . '/../.php-cs-fixer.php',
    'clean-generated' => true,
    'throw-unexpected-status-code' => true,
];
