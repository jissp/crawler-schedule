<?php

namespace App\Client\NaverLandClient;

use App\Client\ClientAbstract;
use App\Interfaces\NaverLand\CrawlingRequestDto;

class NaverLandClient extends ClientAbstract
{
    public function __construct()
    {
        $this->url = '';
    }

    public function run(CrawlingRequestDto $dto = null)
    {
        // TODO: Implement run() method.
    }
}
