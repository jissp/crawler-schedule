<?php

namespace App\Console\Commands;

use App\Client\CrawlerClient\Common\CrawlingRequestResponseDto;
use App\Client\CrawlerClient\NaverLandClient\Dto\CrawlingRequestDto;
use App\Client\CrawlerClient\NaverLandClient\Enums\CompletionTag;
use App\Client\CrawlerClient\NaverLandClient\Enums\ParkingTag;
use App\Client\CrawlerClient\NaverLandClient\Enums\RealEstate;
use App\Client\CrawlerClient\NaverLandClient\Enums\TradeType;
use App\Client\CrawlerClient\NaverLandClient\NaverLandClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class RequestNaverLandCrawling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:request-naver-land-crawling';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '네이버 부동산 매물 수집 요청';

    /**
     * Execute the console command.
     * @return void
     * @throws GuzzleException
     */
    public function handle(): void
    {
        array_map(function (ParkingTag $parkingTag) {
            /** @var NaverLandClient $client */
            $client = resolve(NaverLandClient::class);

            // 아파트, 오피스텔 관련
            /** @var CrawlingRequestDto $dto */
            array_map(function (CrawlingRequestDto $dto) use ($client, $parkingTag) {
                $_dto = clone $dto;
                $_dto->tag = [$parkingTag];

                /** @var CrawlingRequestResponseDto $response */
                $client->collect($_dto);
            }, [
                /** 강남 */
                $this->buildRequestDto(z: 13, lat: 37.5030847, lon: 126.996848, btm: 37.4390515, lft: 126.832053, top: 37.567063, rgt: 127.1616429),
                /** 강북 */
                $this->buildRequestDto(z: 14, lat: 37.5490321, lon: 126.9935435, btm: 37.5170421, lft: 126.911146, top: 37.5810084, rgt: 127.075941),
                /** 강서, 마포, 영등포, 선유도, 당산, 여의도 지역 */
                $this->buildRequestDto(z: 14, lat: 37.5470586, lon: 126.8909544, btm: 37.5150678, lft: 126.8337482, top: 37.5790358, rgt: 126.9481605),
                /** 역곡/부천 지역 */
                $this->buildRequestDto(z: 14, lat: 37.5053997, lon: 126.8732089, btm: 37.473391, lft: 126.7908114, top: 37.5373948, rgt: 126.9556063),
                /** 독산/광명 지역 */
                $this->buildRequestDto(z: 14, lat: 37.4620825, lon: 126.9333762, btm: 37.4300552, lft: 126.8509787, top: 37.4940961, rgt: 127.0157736),
                /** 평촌, 과천 지역 */
                $this->buildRequestDto(z: 14, lat: 37.4161156, lon: 127.0023626, btm: 37.3840686, lft: 126.9199651, top: 37.4481489, rgt: 127.0847601),
                /** 강동, 하남 지역 */
                $this->buildRequestDto(z: 14, lat: 37.5444386, lon: 127.1595186, btm: 37.5124466, lft: 127.0771211, top: 37.5764169, rgt: 127.241916),
                /** 수서, 위례 지역 */
                $this->buildRequestDto(z: 14, lat: 37.4761497, lon: 127.1307653, btm: 37.4441284, lft: 127.0483678, top: 37.5081573, rgt: 127.2131628),
                /** 판교 지역 */
                $this->buildRequestDto(z: 14, lat: 37.3986619, lon: 127.1098226, btm: 37.3666075, lft: 127.0274252, top: 37.4307027, rgt: 127.1922201),
                /** 수지, 광교 지역 */
                $this->buildRequestDto(z: 14, lat: 37.3058028, lon: 127.0758337, btm: 37.2737087, lft: 127.0186275, top: 37.3378832, rgt: 127.1330398),
                /** 단독주택 */
                DtoMapper(CrawlingRequestDto::class, ['rletTpCd' => [RealEstate::단독다가구, RealEstate::전원주택], 'tradTpCd' => [TradeType::매매, TradeType::전세, TradeType::월세], 'z' => 12, 'lat' => 37.5385348, 'lon' => 127.0896417, 'btm' => 37.4667662, 'lft' => 126.7600518, 'top' => 37.6102343, 'rgt' => 127.4192315, 'dprcMin' => 10000, 'dprcMax' => 50000, 'wprcMin' => 8000, 'wprcMax' => 25000, 'rprcMin' => 70, 'rprcMax' => 150, 'spcMin' => 45, 'spcMax' => 9999, 'page' => 1, 'maxPage' => 999]),
            ]);

            // 빌라 관련
            array_map(function (CrawlingRequestDto $dto) use ($client, $parkingTag) {
                $_dto = clone $dto;
                $_dto->tag = [$parkingTag, CompletionTag::COMPLETION4UNDER];

                /** @var CrawlingRequestResponseDto $response */
                $client->collect($_dto);
            }, [
                DtoMapper(CrawlingRequestDto::class, ['rletTpCd' => [RealEstate::빌라], 'tradTpCd' => [TradeType::월세], 'z' => 12, 'lat' => 37.5089517, 'lon' => 126.9837205, 'btm' => 37.4804183, 'lft' => 126.8738572, 'top' => 37.5374742, 'rgt' => 127.0935838, 'wprcMin' => 1000, 'wprcMax' => 18000, 'rprcMin' => 50, 'rprcMax' => 150, 'spcMin' => 44, 'spcMax' => 9999, 'page' => 1, 'maxPage' => 999]),
                DtoMapper(CrawlingRequestDto::class, ['rletTpCd' => [RealEstate::빌라], 'tradTpCd' => [TradeType::월세], 'z' => 12, 'lat' => 37.5441438, 'lon' => 127.0579641, 'btm' => 37.5133091, 'lft' => 126.9481008, 'top' => 37.5749658, 'rgt' => 127.1678274, 'wprcMin' => 1000, 'wprcMax' => 18000, 'rprcMin' => 50, 'rprcMax' => 150, 'spcMin' => 44, 'spcMax' => 9999, 'page' => 1, 'maxPage' => 999]),
            ]);
        }, [ParkingTag::PARKINGYN, ParkingTag::PARKINGONE, ParkingTag::PARKINGMORE]);

    }

    /**
     * @param int $z
     * @param float $lat
     * @param float $lon
     * @param float $btm
     * @param float $lft
     * @param float $top
     * @param float $rgt
     * @param array $tags
     * @return object|null
     */
    private function buildRequestDto(int $z, float $lat, float $lon, float $btm, float $lft, float $top, float $rgt, array $tags = []): ?object
    {
        return DtoMapper(CrawlingRequestDto::class, [
            'rletTpCd' => [
                RealEstate::아파트, RealEstate::오피스텔, RealEstate::전원주택
            ],
            'tradTpCd' => [
                TradeType::매매,
                TradeType::전세,
                TradeType::월세,
            ],
            'z' => $z,
            'lat' => $lat,
            'lon' => $lon,
            'btm' => $btm,
            'lft' => $lft,
            'top' => $top,
            'rgt' => $rgt,
            'dprcMin' => 10000,
            'dprcMax' => 50000,
            'wprcMin' => 1000,
            'wprcMax' => 30000,
            'rprcMin' => 60,
            'rprcMax' => 140,
            'spcMin' => 40,
            'spcMax' => 9999,
            'tag' => $tags,
            'page' => 1,
            'maxPage' => 999
        ]);
    }
}
