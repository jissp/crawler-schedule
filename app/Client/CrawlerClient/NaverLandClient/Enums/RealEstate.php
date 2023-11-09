<?php

namespace App\Client\CrawlerClient\NaverLandClient\Enums;

enum RealEstate: string
{
    /** 아파트 */
    case 아파트 = 'APT';
    /** 오피스텔 */
    case 오피스텔 = 'OPST';
    /** 빌라 */
    case 빌라 = 'VL';
    /** 아파트분양권 */
    case 아파트분양권 = 'ABYG';
    /** 오피스텔분양권 */
    case 오피스텔분양권 = 'OBYG';
    /** 재건축 */
    case 재건축 = 'JGC';
    /** 전원주택 */
    case 전원주택 = 'JWJT';
    /** 단독/다가구 */
    case 단독다가구 = 'DDDGG';
    /** 상가주택 */
    case 상가주택 = 'SGJT';
    /** 한옥주택 */
    case 한옥주택 = 'HOJT';
    /** 재개발 */
    case 재개발 = 'JGB';
    /** 원룸 */
    case 원룸 = 'OR';
    /** 고시원 */
    case 고시원 = 'GSW';
    /** 상가 */
    case 상가 = 'SG';
    /** 사무실 */
    case 사무실 = 'SMS';
    /** 공장/창고 */
    case 공장창고 = 'GJCG';
    /** 건물 */
    case 건물 = 'GM';
    /** 토지 */
    case 토지 = 'TJ';
    /** 지식산업센터 */
    case 지식산업센터 = 'APTHGJ';
}
