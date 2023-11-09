<?php

namespace App\Client\CrawlerClient\AwsRecentClient;

use App\Client\ClientAbstract;
use App\Client\CrawlerClient\Interfaces\CrawlerClientInterface;
use App\Client\Enums\HttpMethod;
use GuzzleHttp\Exception\GuzzleException;

class AwsRecentClient extends ClientAbstract implements CrawlerClientInterface
{
    public function __construct()
    {
        parent::__construct(config('client.crawler.host'));
    }

    /**
     * @return object|null
     * @throws GuzzleException
     */
    public function collect(): object|null
    {
        return $this->call(HttpMethod::POST, '/v1/aws-recent/collect');
    }
}
