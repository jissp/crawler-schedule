<?php

namespace App\Client\CrawlerClient\NaverLandClient\Enums;

enum ParkingTag: string
{
    /** 주차가능 */
    case PARKINGYN = 'PARKINGYN';
    /** 세대당 1대이상 */
    case PARKINGONE = 'PARKINGONE';
    /** 세대당 1.5대이상 */
    case PARKINGMORE = 'PARKINGMORE';
}
