<?php
require_once('_calendar.php');
?>
<html>
<head>
	<title>calendar</title>
</head>
<body>

<p><?php echo $calendar->get_year();?>年<?php echo $calendar->get_month();?>月</p>
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
	<?php
		$start_cell = $calendar->set_tbl_start();
		$end_cell = $calendar->set_tbl_end();
	?>
	<tr>
		<?php for($i = 0; $i < $start_cell; $i++):?>
			<td>&nbsp</td>
		<?php endfor;?>

		<?php foreach ($calendar->cell as $key => $value):?>
			<?php if($calendar->get_weekday($calendar->get_month(),$value,$calendar->get_year()) === 0):?>
				<tr>
			<?php endif?>
			<td><?php echo $value;?></td>
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