<?php

namespace App\Client;

use App\Client\CrawlerClient\Common\CrawlingRequestResponseDto;
use App\Client\Enums\HttpMethod;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @property Client $client
 */
abstract class ClientAbstract
{
    private Client $client;

    public function __construct(string $host)
    {
        $this->client = new Client([
            'base_uri' => $host,
            'verify' => false,
        ]);
    }

    /**
     * @param HttpMethod $method
     * @param string $path
     * @param object|array|null $params
     * @return object|null
     * @throws GuzzleException
     */
    protected function call(HttpMethod $method, string $path, object|array $params = null): ?object
    {
        $options = [];

        if ($params) {
            $options['json'] = is_array($params) ?: objectToArray($params);
        }

        $response = $this->client->request($method->value, $path, options: $options);

        $content = $response->getBody()?->getContents();

        if (!$content) {
            return null;
        }

        return DtoMapper(CrawlingRequestResponseDto::class, json_decode($content, JSON_OBJECT_AS_ARRAY));
    }
}
