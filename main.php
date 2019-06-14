#!/usr/bin/php
<?php
/**
 * https://github.com/egin10
 * Get List Schools Data from url
 * url : http://bansmkaltim.id/
 */

require_once __DIR__."/src/func.php";
require_once __DIR__."/src/xlsxwriter.class.php";
date_default_timezone_set("Asia/Jakarta");

$getData = new GetData;

$base_url = "http://bansmkaltim.id/";
$ch_url = curl_init($base_url);
curl_setopt_array($ch_url, [CURLOPT_RETURNTRANSFER => true]);
$get_url = curl_exec($ch_url);

$dataSch = $getData->getDataSchool($get_url);

print_r($dataSch);

curl_close($ch_url);

//Write xlsx
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// error_reporting(E_ALL & ~E_NOTICE);
// $filename = implode("_", explode(" ", $nameProv))."_".date('d-m-Y').".xlsx";
// $writer = new XLSXWriter();
// $writer->setAuthor('egin10'); 
// foreach($arrSekolah as $row){
// 	if($row != NULL) $writer->writeSheetRow('Sheet1', $row);
// }
// $writer->writeToFile($filename);

// $mv = rename($filename, __DIR__."/FILES/".$filename);
// if($mv) {
// 	echo "File created!\n";
// 	echo "DONE!\n";
// }

unset($getData);