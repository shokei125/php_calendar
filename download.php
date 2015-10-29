<?php exec('ls -v ./data | grep .csv',$files);?>
<html>
<head>
	<title>csvダウンロード</title>
</head>
<body>
<h2>csvダウンロード</h2>
<?php if(empty($files)):?>
	<p>csvファイルまだアップされてません。</p>
<?php else:?>
	<form action="_csv_download.php" method="post">
		<select name="filename" id="">
		<?php foreach($files as $file):?>
			<option value=<?php echo $file;?> >
				<?php $m = preg_replace('/.csv/','', $file);echo $m;?>月
			</option>
		<?php endforeach;?>
		</select>
		<input type="submit" value="ダウンロード">
	</form>
<?php endif;?>
<a href="index.php">戻る</a>
</body>
</html>