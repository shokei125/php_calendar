<?php
$error_mes = '';

try{
	if(empty($_POST['filename'])){
		throw new RuntimeException('月を選択してください。');
	}else{
		$filename = str_pad($_POST['filename'], 2, '0',STR_PAD_LEFT). '.csv';
	}
	if ( !isset($_FILES['upfile']['error']) || !is_int($_FILES['upfile']['error'])) {
		throw new RuntimeException('パラメータが不正です');
	}

	// $_FILES['upfile']['error'] の値を確認
	switch ($_FILES['upfile']['error']) {
		case UPLOAD_ERR_OK: // OK
			break;
		case UPLOAD_ERR_NO_FILE:   // ファイル未選択
			throw new RuntimeException('ファイルが選択されていません');
		case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
		case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
			throw new RuntimeException('ファイルサイズが大きすぎます');
		default:
			throw new RuntimeException('その他のエラーが発生しました');
	}

	$finfo = new finfo(FILEINFO_MIME_TYPE);
	$ext = $finfo->file($_FILES['upfile']['tmp_name']);
	if($ext !== 'text/plain'){
		throw new RuntimeException('ファイル形式が不正です');
	}
	if(!move_uploaded_file($_FILES['upfile']['tmp_name'], __DIR__.'/data/'.$filename)){
		throw new RuntimeException('ファイル保存時エラーが発生しました。');
	}
	header('Location: index.php?mes=0');
	exit;
} catch (RuntimeException $e) {
	$error_mes = $e->getMessage();
}
if(!empty($error_mes)){
	echo $error_mes;
	echo '<a href="upload.php">戻る</a>';
}
