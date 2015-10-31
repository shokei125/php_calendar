<?php
setlocale(LC_ALL, 'ja_JP.UTF-8');
/**
 * [get_csv 行ごとの格納]
 * @param  [type] $filename [description]
 * @return [type]           [description]
 */
function get_csv($filename){
	$data = array();
	if(!file_exists($filename)) file_put_contents($filename, "");//csvない場合生成
	$handle = fopen($filename, 'r');
	while( ($line = fgetcsv($handle,',')) !== false ){
		$data []= $line;
	}
	fclose($handle);
	return $data;
}
/**
 * [get_words 該当日付のデータの格納]
 * @param  [type] $data [description]
 * @param  [type] $day  [description]
 * @return [type]       [description]
 */
function get_words($data,$day){
	$words = '';
//csvからwordsのサーチ
	foreach ($data as $key => $value) {
		if($value[0] === $day){
			unset($value[0]);
			$words = implode("\n", $value);
			break;
		}
	}
	return $words;
}
/**
 * フロントのワードの取得
 */
function rand_words(){
	$m = date('m',strtotime('today'));
	$day = date('md',strtotime('today'));
	$filename = './data/'.$m.'.csv';
	$words = array();
	if(file_exists($filename)){
		$data = get_csv($filename);
	}
	foreach($data as $key => &$value){
		if($value[0] === $day){
			unset($value[0]);
			$words = $data[$key];
			break;
		}
	}
	$word = $words[array_rand($words)];
	return trim($word);
}
