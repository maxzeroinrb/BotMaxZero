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
		if($event['type'] == 'message'){
 				switch($event['message']['type']){
	 				case 'text':
	 					if($event['message']['text'] == "/help"){

	 						$replyToken = $event['replyToken'];  
	 						$text = "คุณสามารถ พิมพ์ว่า /help เพื่อลิสดูคำสั่งที่สามารถทำงานให้คุณได้ค่ะ";
	 							 			
	 					 	$sticker = [
							'type' => 'sticker',
							'packageId' => '3',
							'stickerId' => '180'	
	 						];
							$messages = [
							'type' => 'text',
							'text' => $text
							];


	 					}else{
	 						$text = "ว่าอะไรนะ";
	 						$sticker = [
							'type' => 'sticker',
							'packageId' => '2',
							'stickerId' => '149'	
	 						];
	 						$messages = [
							'type' => 'text',
							'text' => $text
							];
	 					}

						$senddata =  [
							'replyToken' => $replyToken,
							'messages' => [$sticker,$messages],
						];

					break;
					case 'image':

					break;
					 case 'video':
					 
					 break;
					 case 'audio':
					 
					 break;
					 case 'location':

					break;
					 case 'sticker':

					 break;
			    }
			 
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = $senddata;
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
echo "OK";
