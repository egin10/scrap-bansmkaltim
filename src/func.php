<?php

/**
 * https://github.com/egin10
 * Class GetData
 */

class GetData
{
    private function getStringBetween(String $teks, String $sebelum, String $sesudah): String 
    {
        $teks = ' '.$teks;
        $ini = strpos($teks, $sebelum);
        if($ini == 0) return '';
        $ini += strlen($sebelum);
        $panjang = strpos($teks, $sesudah, $ini) - $ini;

        return substr($teks, $ini, $panjang);
    }

    public function getDataSchool(String $url): String
    {
        $dataSch = $this->getStringBetween($url, "</thead>", '<script type="text/javascript">');

        return $dataSch;
    }
}