<?php

require __DIR__ . '/vendor/autoload.php';

use Google\CloudFunctions\FunctionsFramework;
use Psr\Http\Message\ServerRequestInterface;

// Register the function with Functions Framework.
// This enables omitting the `FUNCTIONS_SIGNATURE_TYPE=http` environment
// variable when deploying. The `FUNCTION_TARGET` environment variable should
// match the first parameter.
// curl -m 70 -X POST localhost:8080 -H "Content-Type:application/json" -d '{"name": "BTC_JPY","action": "buy"}'
FunctionsFramework::http('appHttp', 'appHttp');

function appHttp(ServerRequestInterface $request): string
{
    $name = 'World';
    $body = $request->getBody()->getContents();
    if (!empty($body)) {
        $json = json_decode($body, true);
        if (json_last_error() != JSON_ERROR_NONE) {
            echo "JSON_ERROR_NONE";
            throw new RuntimeException(sprintf(
                'Could not parse body: %s',
                json_last_error_msg()
            ));
        }
        $name = $json['name'] ?? $name;
    }
    $queryString = $request->getQueryParams();
    $name = $queryString['name'] ?? $name;
    // return "blah";
    return sprintf('Hello, %s!', htmlspecialchars($name));
}
