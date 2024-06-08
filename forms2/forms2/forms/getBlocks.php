
<?php
require('db.php');
header('Content-Type: application/json');
$block = $obj->select('DISTINCT BLOCK_NAME','school_basic',['DISTNAME'=>$_POST['DISTNAME']]);
echo json_encode($block);

