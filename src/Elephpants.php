<?php

namespace App;

use Aws\Sdk;

final class Elephpants
{
    /**
     * @var string
     */
    private $bucket = 'elephpants-in-the-sky';
    
    /**
     * @var string
     */
    private $prefix = 'photos';
    
    /**
     * @var Sdk
     */
    private $sdk;

    /**
     * Registers the SDK with this object.
     *
     * @param Sdk $sdk The SDK object.
     */
    public function __construct(Sdk $sdk)
    {
        $this->sdk = $sdk;
    }

    /**
     * Returns 5 random items.
     *
     * @return array The items.
     */
    public function findAll(): array
    {
        $s3 = $this->sdk->createS3();
        $result = $s3->listObjects([
            'Bucket' => $this->bucket,
            'Prefix' => $this->prefix,
        ]);
        return $result['Contents'];
    }
}
