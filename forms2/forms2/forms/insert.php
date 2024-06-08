<?php
session_start();
require ("save_data.php");

require ("db.php");

if(isset($_POST['submit'])){

    $state = $_POST['state'];
    $district = $_POST['district'];
    $block = $_POST['block'];
    $school = $_POST['school'];
    $remark = $_POST['remark'];
    $class = $_POST['class'];

$boys = $_POST['boys'];
$girls = $_POST['girls'];

$class_info = [];

foreach ($class as $index => $class_name) {
    $class_info[$class_name] = [
        "boy" => $boys[$index],
        "girl" => $girls[$index]
    ];
}
$collection = json_encode($class_info);


$file = $_FILES['uploadfile'];
$filename  = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$filesize  = $_FILES["uploadfile"]["size"];
$fileerror  = $_FILES["uploadfile"]["error"];
$filetype  = $_FILES["uploadfile"]["type"];
$folder  = "std_images/".$filename;
move_uploaded_file($tempname, $folder);

$data_array = [
    "state" => $state,
    "district" => $district,
    "block" => $block,
    "school" => $school,
    "std_images" => $folder,
    "collection" => $collection,
    "remarks" => $remark,
   
];





if($obj->insert('student_info',$data_array)){
    $_SESSION['msg'] = "Form successfully submitted";
    header("location:index.php");
    
}else {
    echo "failed";
}
}













   