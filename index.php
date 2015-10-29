<?php
require_once('_calendar.php');
$start_cell = $calendar->set_tbl_start();
$end_cell = $calendar->set_tbl_end();
?>
<html>
<head>
	<title>calendar</title>
</head>
<style type="text/css">
	li{display: inline-block;}
</style>
<body>
<?php if(isset($_GET['error_flg']) && $_GET['error_flg'] === '1'):?>
<p>日付のエラー</p>
<?php endif;?>
<?php if(isset($_GET['mes']) && $_GET['mes'] === '0'):?>
<p>ファイルを正常にアップしました。</p>
<?php endif;?>
<?php if(isset($_GET['mes']) && $_GET['mes'] === '1'):?>
<p>変更は保存しました。</p>
<?php endif;?>
<?php if(isset($_GET['mes']) && $_GET['mes'] === '2'):?>
<p>保存失敗しました。</p>
<?php endif;?>

<h2><?php echo $calendar->get_year();?>年<?php echo $calendar->get_month();?>月</h2>

<ul>
	<li>
		<form action="index.php" method="post">
			<input type="hidden" name="m" value=<?php echo $calendar->pre['m'];?>>
			<input type="hidden" name="y" value=<?php echo $calendar->pre['y'];?>>
			<input type="submit" value="先月">
		</form>
	</li>
	<li>
		<form action="index.php" method="post">
			<input type="hidden" name="m" value=<?php echo $calendar->next['m'];?>>
			<input type="hidden" name="y" value=<?php echo $calendar->next['y'];?>>
			<input type="submit" value="来月">
		</form>
	</li>
	<li><a href="download.php">csvダウンロード</a></li>
	<li><a href="upload.php">csvアップロード</a></li>
</ul>

<table border="1">
	<thead>
		<tr>
			<th>日</th>
			<th>月</th>
			<th>火</th>
			<th>水</th>
			<th>木</th>
			<th>金</th>
			<th>土</th>
		</tr>
	</thead>

	<tr>
		<?php for($i = 0; $i < $start_cell; $i++):?>
			<td>&nbsp</td>
		<?php endfor;?>

		<?php foreach ($calendar->cell as $key => $value):?>
			<?php if($calendar->get_weekday($calendar->get_month(),$value,$calendar->get_year()) === 0):?>
				<tr>
			<?php endif?>
			<td><a href=<?php echo 'edit.php?y=',$calendar->get_year(),'&m=',$calendar->get_month(),'&d=',$value;?> id=""><?php echo $value;?></a></td>
			<?php if($key === count($calendar->cell) - 1):?>
				<?php for($i = 0; $i < $end_cell; $i++):?>
						<td>&nbsp</td>
				<?php endfor;?>
			<?php endif;?>
			<?php if(($calendar->get_weekday($calendar->get_month(),$value,$calendar->get_year()) === 6)):?>
				</tr>
			<?php endif;?>
		<?php endforeach;?>
<?php if( ($calendar->get_weekday($calendar->get_month(),end($calendar->cell),$calendar->get_year())) !== 6 ):?>
	</tr>
<?php endif;?>
	<tfoot></tfoot>
</table>

</body>
</html>