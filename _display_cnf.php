<?php
require_once('_csv_common.php');
$cnf = $_POST['display_cnf'];
if($cnf){
	set_config($cnf);
}
