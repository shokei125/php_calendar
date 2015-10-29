<?php exec('ls -v ./data',$files);?>
<html>
<head>
	<title>csvダウンロード</title>
</head>
<body>
<h2>csvダウンロード</h2>
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
</body>
</html>