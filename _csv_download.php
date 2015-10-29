<?php
$filename = $_POST['filename'];
$fpath = './data/'.$filename;

header('Content-Type: application/force-download');
header('Content-Length: '.filesize($fpath));
header('Content-disposition: attachment; filename="'.$filename.'"');
readfile($fpath);