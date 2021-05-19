<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new Items($db);
 
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id) && !empty($data->email) && 
!empty($data->industry) && !empty($data->country){ 
    $items->id = $data->id; 
	$items->email = $data->email;
    $items->industry = $data->industry;
    $items->country = $data->country;
    $items->created_date = date('Y-m-d H:i:s'); 