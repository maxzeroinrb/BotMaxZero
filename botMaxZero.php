<?php
$access_token = 'jtqPqB5fZ6o4qDNivmswM07ymMVt8Sd0JFzW5NzSHApplakd3v/CP/KwrzSIZLJ9nrhhgfJBJ7iXjSdDVks4jkjHvP3kL767FnvjAJ0zhMPiF7EkROzBRtpY9NQ++WMFVt4WY+RHePqqiprDW9bjZgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			 if(strlen($text) != mb_strlen($text, 'utf-8'))
			    { 
			        // echo "Please enter English words only:(";
			    }
			    else {
			       			$urlcard  = getcard($text);

							// Get replyToken
							$replyToken = $event['replyToken'];

							// Build message to reply back
							$messages = [
								'type' => 'text',
								'text' => $urlcard
							];

							// Make a POST Request to Messaging API to reply to sender
							$url = 'https://api.line.me/v2/bot/message/reply';
							$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages],
							];
							$post = json_encode($data);
							$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

							$ch = curl_init($url);
							curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
							$result = curl_exec($ch);
							curl_close($ch);

							echo $result . "\r\n";
			    }

		}
	}
}
function getcard($name){

	$content = file_get_contents('php://input');

			// Make a POST Request to Messaging API to reply to sender
			$url = 'http://cardfight.wikia.com/api/v1/Search/List?query=';
			$limit = '&limit=1';
			$cardname = $name;

			$urlquerycard = $url.$cardname.$limit;
			// $data = [
			// 	'replyToken' => $replyToken,
			// 	'messages' => [$messages],
			// ];
			// $post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($urlquerycard);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			$arrayitem =  $obj->items;
			$cardlist = $arrayitem[0]->url;

			if($arrayitem != ""){
				$cardlist = $arrayitem[0]->url;
				echo $cardlist;
			}else{
				$cardlist = "การ์ดใบนี้ไม่มีนะจ๊ะ";
			}
			

		return $cardlist;
}














