<?php
/**
 * csvの読み込み
 * 編集画面に表示
 */
require_once('_csv_common.php');
/**
 * GETの格納
 * @var [type]
 */
foreach ($_GET as $key => $value) {
	$tmp = $value;
	$$key = $tmp;
}
$day = $m.$d;
$words = '';

if(!checkdate($m, $d, $y)){
	header('location:index.php?error_flg=1');
	exit;
}

$csv = array();
$filename = './data/'.$m.'.csv';

if(file_exists($filename)){
	$data = get_csv($filename);
	$words = get_words($data,$day);
}

