<?php

namespace App\Client\CrawlerClient\NaverLandClient;

use App\Client\ClientAbstract;
use App\Client\CrawlerClient\Interfaces\CrawlerClientInterface;
use App\Client\CrawlerClient\NaverLandClient\Dto\CrawlingRequestDto;
use App\Client\Enums\HttpMethod;
use GuzzleHttp\Exception\GuzzleException;

class NaverLandClient extends ClientAbstract implements CrawlerClientInterface
{
    public function __construct()
    {
        parent::__construct(config('client.crawler.host'));
    }

    /**
     * @param CrawlingRequestDto|null $dto
     * @return object|null
     * @throws GuzzleException
     */
    public function collect(CrawlingRequestDto $dto = null): object|null
    {
        return $this->call(HttpMethod::POST, '/v1/naver-land/collect', $dto);
    }
}
