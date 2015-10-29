<?php
/**
 * 編集の送信処理
 * csvの書き換えと生成
 */
require_once('_csv_common.php');
/**
 * POSTの格納
 * @var [type]
 */
foreach ($_POST as $key => $value) {
	$tmp = $value;
	$$key = $tmp;
}
$data_flg = false;
$day = $m.$d;
$new_data = array();
$filename = './data/'.$m.'.csv';
//csvと該当日の内容の取得
$data = get_csv($filename);
$words = get_words($data,$day);

//ｃｓｖの走査
//日付既存の場合
foreach ($data as $key => $value) {
	if($value[0] === $day){
		$texts = str_replace(array("\r\n","\r","\n"), "\n", $texts);//改行コードの統一
		$value = explode("\n", $day."\n".$texts);
		$new_data []= $value;
		$data_flg = true;
		continue;
	}
	$new_data []= $value;
}
//日付新規の場合
if(!$data_flg){
	$texts = str_replace(array("\r\n","\r","\n"), "\n", $texts);//改行コードの統一
	$new_data []= explode("\n", $day."\n".$texts);
//日付のソート
	$sort_key = array();
	foreach ($new_data as $key => $value) {
		$sort_key[$key] =$value[0];
	}
	array_multisort($sort_key,SORT_ASC,$new_data);
}
//csvの書き出し
$handle = fopen($filename, 'w+');
foreach ($new_data as $key => $value) {
	fputcsv($handle, $value,",",'"');
}
$flg = fclose($handle);
if($flg){
	header('Location:index.php?mes=1');
	exit;
}else{
	header('Location:index.php?mes=2');
	exit;
}