<?php declare(strict_types=1);

use Aws\Sdk;
use App\Response;
use App\Elephpants;

require __DIR__.'/vendor/autoload.php';

return function (array $event) {
    $sdk = new Sdk([
        'region' => 'us-east-1',
        'version' => 'latest',
    ]);
    $elephpants = new Elephpants($sdk);
    $items = $elephpants->findAll();
    $response = new Response($items);
    return $response->send();
};
