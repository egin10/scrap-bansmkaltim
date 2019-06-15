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

    public function getDataSchool(String $url): Array
    {
        $data = [];
        $dataSch = trim($this->getStringBetween($url, "</thead>", '<script type="text/javascript">'));
        $arrDataSch = explode('<tr onclick="javascript:pilih(this);">', $dataSch); //iterate from 1 not 0
        for($i=1; $i < count($arrDataSch); $i++)
        {
            $explDataSch = explode("<td", $arrDataSch[$i]);
            $no = trim($this->getStringBetween($explDataSch[1],">","</td>"));
            $schName = trim($this->getStringBetween($explDataSch[2],">","</td>"));
            $schLevel = trim($this->getStringBetween($explDataSch[3],">","</td>"));
            $schDist = trim($this->getStringBetween($explDataSch[4],">","</td>"));
            $schSubDist = trim($this->getStringBetween($explDataSch[5],">","</td>"));
            $schVil = trim($this->getStringBetween($explDataSch[6],">","</td>"));
            $schAddr = trim($this->getStringBetween($explDataSch[7],">","</td>"));
            $schPhone = trim($this->getStringBetween($explDataSch[8],">","</td>"));
            $schStats = trim($this->getStringBetween($explDataSch[9],">","</td>"));
            
            $data[] = [
                "no" => $no,
                "schName" => $schName,
                "schLevel" => $schLevel,
                "schDist" => $schDist,
                "schSubDist" => $schSubDist,
                "schVil" => $schVil,
                "schAddr" => $schAddr,
                "schPhone" => $schPhone,
                "schStats" => $schStats
            ];
        }

        return $data;
    }
}