<?php require_once('_csv_common.php');?>
<h1>今日の一言</h1>
<?php $status = get_config();?>
<?php if($status === 'on'):?>
<p><?php echo rand_words(); ?></p>
<?php endif;?>
