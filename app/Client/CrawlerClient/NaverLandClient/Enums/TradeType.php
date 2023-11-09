<?php

namespace App\Client\CrawlerClient\NaverLandClient\Enums;

enum TradeType: string
{
    /** 매매 */
    case 매매 = 'A1';
    /** 전세 */
    case 전세 = 'B1';
    /** 월세 */
    case 월세 = 'B2';
    /** 단기임대 */
    case 단기임대 = 'B3';
}
