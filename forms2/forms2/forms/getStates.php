<?php
require('db.php');
header('Content-Type: application/json');
$state = $obj->select('DISTINCT STATE','school_basic');
echo json_encode($state);
