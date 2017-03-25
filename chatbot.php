<?php

$accesToken = "EAAEFyqcYaVQBAAb53zYaneZAJKZB9LLpZAsZCIkQrBgJz4gG4LZBSHBvVZBSZAlpGs4ejWkaDbB3SiFmqccRIiTnzBiqH1ITnKvA3acjetKpNTZCerxlytc49ZAM6ZAwtZB6lVz1fLY3ZB3jUooJPLsPHEm651MA9HjWbZAzYancjrvlZAQAZDZD";

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


//............


$url = "https://graph.facebook.com/v2.6/me/messages?acces_token$accesToken";

$jsonData = "{
  'receipient': {
    'id': $userID
  },
  'message': {
    'text': 'Bonjour :)'
  }
}";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true)
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

if(!empty($input['entry'][0]['messaging'][0]['message'])) {
  curl_exec($ch);

}

 ?>
