<?php require_once('_csv.php');?>
<html>
<head>
<title>編集画面</title>
</head>
<body>
	<h3>編集画面</h3>
	<form action="_csv_fin.php" method="post">
		<input type="hidden" name="m" value=<?php echo $m;?>>
		<input type="hidden" name="d" value=<?php echo $d;?>>
		<textarea name="texts" id="texts" cols="30" rows="10"><?php if(!empty($words)) echo $words;?></textarea><br>
		<input type="submit" value="編集">
	</form>
</body>
</html>