<?php

namespace App\Console\Commands;

use App\Interfaces\NaverLand\CrawlingRequestDto;
use Illuminate\Console\Command;

class CrawlingNaverLand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:crawling-naver-land';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '네이버 부동산 매물 수집 요청';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dto = new CrawlingRequestDto();
    }
}
