<?php

namespace App\Client\CrawlerClient\Interfaces;

interface CrawlerClientInterface
{
    public function collect(): object|null;
}
