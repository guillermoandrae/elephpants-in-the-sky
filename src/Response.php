<?php

namespace App;

final class Response
{
    /**
     * @var array
     */
    private $objects = [];

    /**
     * Registers S3 object data with this object.
     *
     * @param array $objects
     */
    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }

    /**
     * Returns the response array.
     *
     * @return array The response array.
     */
    public function send(): array
    {
        return [
            'statusCode' => 200,
            'headers' => [
                'Access-Control-Allow-Origin' => '*',
            ],
            'body' => json_encode($this->getBody()),
        ];
    }

    /**
     * Returns the response body.
     *
     * @return array The response body.
     */
    private function getBody(): array
    {
        $body = ['data' => []];
        foreach ($this->objects as $object) {
            $body['data'][] = [
                'color' => explode('/', explode('-', $object['Key'])[0])[1],
                'url' => sprintf('%s/%s', 'https://s3.amazonaws.com/elephpants-in-the-sky', $object['Key']),
            ];
        }
        return $body;
    }
}
