<?php
require('db.php');
header('Content-Type: application/json');
$district = $obj->select(' DISTINCT DISTNAME','school_basic',['STATE'=>$_POST['STATE']]);
echo json_encode($district);

