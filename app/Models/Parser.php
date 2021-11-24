<?php

namespace App\Models;

use KubAT\PhpSimple\HtmlDomParser;

class Parser
{
    private $rootUrl = 'https://www.e-obce.sk/kraj/NR.html';

    private $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

    private function getDistrictsUrls() {
        $html = HtmlDomParser::file_get_html($this->rootUrl, false, stream_context_create($this->arrContextOptions));
        $districts = $html->find('div[class=okres] a[class=okreslink]');
        $urls = [];
        foreach ($districts as $district)
            $urls[] = $district->href;
        return $urls;
    }

    public function getCitiesUrls() {
        $urls = [];
        foreach ($this->getDistrictsUrls() as $districtUrl) {
            $html = HtmlDomParser::file_get_html($districtUrl, false, stream_context_create($this->arrContextOptions));
            $citiesTable = $html->find('div[class=telo] table table td[height=29]>table', 1);
            $cities = $citiesTable->find('a');
            foreach ($cities as $city)
                $urls[] = $city->href;
            array_pop($urls);
        }
        return $urls;
    }

    public function getCityData($url) {
        $html = HtmlDomParser::file_get_html($url, false, stream_context_create($this->arrContextOptions));
        $html = $html->find('div[class=telo] table table', 0);

        $emails = [];
        foreach ($html->find('td[height=29]>table', 0)->children(4)->children(2)->find('a') as $email)
            $emails[] = $email->plaintext;

        $webAddresses = [];
        foreach ($html->find('td[height=29]>table', 0)->children(5)->children(2)->find('a') as $webAddress)
            $webAddresses[] = $webAddress->plaintext;

        $data = [
            'name' => $html->find('table td', 0)->plaintext,
            'mayor_name' => $html->find('td[height=29]>table', 1)->children(7)->children(1)->plaintext,
            'city_hall_address' => $html->find('td[height=29]>table', 0)->children(4)->children(0)->plaintext . ", " . $html->find('td[height=29]>table', 0)->children(5)->children(0)->plaintext,
            'phone' => $html->find('td[height=29]>table', 0)->children(2)->children(3)->plaintext,
            'fax' => $html->find('td[height=29]>table', 0)->children(3)->children(2)->plaintext,
            'img_path' => $html->find('td[height=29]>table img', 1)->src,
            'emails' => $emails,
            'web_addresses' => $webAddresses,
            ];

        return $this->dataTrim($data);
    }

    private function dataTrim($data) {
        $trimmedData = [];
        foreach ($data as $key=>$value) {
            if (is_array($value))
                $trimmedData[$key] = $this->dataTrim($value);
            else
                $trimmedData[$key] = trim($value);
        }
        return $trimmedData;
    }
}
