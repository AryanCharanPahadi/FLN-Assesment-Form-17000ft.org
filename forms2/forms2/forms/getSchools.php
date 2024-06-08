<?php
require('db.php');
header('Content-Type: application/json');
$schools = $obj->select('SCHOOL_NAME','school_basic',['BLOCK_NAME'=>$_POST['BLOCK_NAME']]);
echo json_encode($schools);
