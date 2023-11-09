<?php

namespace App\Console\Commands;

use App\Client\CrawlerClient\AwsRecentClient\AwsRecentClient;
use App\Client\CrawlerClient\Common\CrawlingRequestResponseDto;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class RequestAwsRecentCrawling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:request-aws-recent-crawling';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'AWS Recent 수집 요청';

    /**
     * Execute the console command.
     * @return void
     * @throws GuzzleException
     */
    public function handle(): void
    {
        /** @var AwsRecentClient $client */
        $client = resolve(AwsRecentClient::class);

        /** @var CrawlingRequestResponseDto $response */
        $client->collect();
    }
}
