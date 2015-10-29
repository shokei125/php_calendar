<html>
<head>
	<title>csvアップロード</title>
</head>
<body>
<h2>csvアップロード</h2>

<form enctype="multipart/form-data" action="_csv_upload.php" method="post">
	<select name="filename" id="">
		<option value="">月を選択してください。</option>
	<?php for($i = 1; $i < 13; $i++):?>
		<option value=<?php echo $i;?> ><?php echo $i;?>月</option>
	<?php endfor;?>
	</select>
	<input type="file" name="upfile">
	<input type="submit" value="アップロード">
</form>
</body>
</html>