<?php

namespace App\Client\CrawlerClient\NaverLandClient\Dto;

use App\Client\CrawlerClient\NaverLandClient\Enums\RealEstate;
use App\Client\CrawlerClient\NaverLandClient\Enums\TradeType;

class CrawlingRequestDto
{
    /** @var RealEstate[] */
    public array $rletTpCd;

    /** @var TradeType[] */
    public array $tradTpCd;
    public int $z;
    public float $lat;
    public float $lon;
    public float $btm;
    public float $lft;
    public float $top;
    public float $rgt;
    /** 매매가(최소) */
    public int $dprcMin;
    /** 매매가(최대) */
    public int $dprcMax;
    /** 보증금(최소) */
    public int $wprcMin;
    /** 보증금(최대) */
    public int $wprcMax;
    /** 월세(최소) */
    public int $rprcMin;
    /** 월세(최대) */
    public int $rprcMax;
    /** 면적(최소) */
    public int $spcMin;
    /** 면적(최대) */
    public int $spcMax;
    public string $showR0;

    public array $tag;
    public string $highSpc;
    public int $page;
    public int $maxPage;
}
