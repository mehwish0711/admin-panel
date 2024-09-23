<?php
include('connection.php');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,X-Request-With,Authorization');


$data = json_decode(file_get_contents("php://input"),true);

$stu_id = $data['sid'];
$name = $data['name'];
$age = $data['age'];
$city = $data['city'];

$sql="UPDATE `user-api` SET name = '{$name }', age = '{$age }', city = '{$city }' WHERE id = {$id}";
if(mysqli_query($db,$sql)){

echo json_encode(array('message'=>'record updated','status' => false));



}else{
    echo json_encode(array('message'=>'record not updated','status'=> false));
}





?>