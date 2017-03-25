<?php

if(isset($_REQUEST['hub_challenge'])){
  $challenge = $_REQUEST['hub_challenge'];
  $token = $_REQUEST['hub_verify_token'];
}

if($token == "monTokenVesoul") {
  echo $challenge;
}

$input = json_decode(file_get_contents('php://input'), true);

$userID = $input['entry'][0]['messaging'][0]['sender']['id'];

$message = $input['entry'][0]['messaging'][0]['message']['text'];

echo $userID." and ".$message; 

 ?>
