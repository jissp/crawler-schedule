<?php

namespace App\Interfaces\NaverLand;

class CrawlingRequestDto
{
    public string $rletTpCd;
    public string $tradTpCd;
    public int $z;
    public int $lat;
    public int $lon;
    public int $btm;
    public int $lft;
    public int $top;
    public int $rgt;
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
//        public int $totCnt;
    public string $tag;
    public string $highSpc;
    public int $page;
    public int $maxPage;

    public function bind($data)
    {

    }
}
