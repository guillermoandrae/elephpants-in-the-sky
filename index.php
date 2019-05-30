<?php declare(strict_types=1);

use Aws\Sdk;
use App\Elephpants;
use function GuzzleHttp\json_encode;

require __DIR__.'/vendor/autoload.php';

lambda(function (array $event) {
    $sdk = new Sdk([
        'region' => 'us-east-1',
        'version' => 'latest',
    ]);
    $elephpants = new Elephpants($sdk);
    $item = $elephpants->random();
    return [
        'url' => sprintf('%s/%s', 'https://s3.amazonaws.com/elephpants-in-the-sky', $item['Key']),
    ];
});
