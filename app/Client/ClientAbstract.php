<?php

namespace App\Client;

use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Mixed_;

/**
 * @property Client $client
 */
abstract class ClientAbstract
{
    protected $url;

    public function __get(string $name)
    {
        switch ($name) {
            case 'client':
                $this->client = new Client();

                return $this->client;
            default:
                return null;
        }
    }

    public abstract function run();

    protected function call(array $params = []): string
    {
        $options = [];
        $options['form_params'] = $params;

        $response = $this->client->get($this->url, $options);
        $body = $response->getBody();

        return $body->getContents();
    }
}
