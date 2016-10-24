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


	 						$text = "คุณสามารถ พิมพ์ว่า /help เพื่อลิสดูคำสั่งที่สามารถทำงานให้คุณได้ค่ะ";
	 							 			
	 					 	$sticker = [
							'type' => 'sticker',
							'packageId' => '3',
							'stickerId' => '180'	
	 						];
							$messages1 = [
							'type' => 'text',
							'text' => $text
							];
							$messages2 = [
							'type' => 'text',
							'text' => "/address [ini3] ขอที่อยู่ บริษัทอินิทรี \n  /location [winner]ชื่อบริษัทเกมส์"
							];

							$replyToken = $event['replyToken']; 
							$senddata =  [
								'replyToken' => $replyToken,
								'messages' => [$sticker,$messages1,$messages2],
							];
						}else if($event['message']['text'] == "/address ini3"){

							$text = "149 อาคารแกแล็คซี่เพลส ชั้น 8 (ห้อง 8/1-8/2) ถนนนนทรี แขวงช่องนนทรี เขตยานนาวา กรุงเทพฯ 10120";
							$messages1 = [
							'type' => 'text',
							'text' => $text
							];
							$replyToken = $event['replyToken']; 
							$senddata =  [
								'replyToken' => $replyToken,
								'messages' => [$messages1],
							];
						}else if($event['message']['text'] == "/location winner"){

							$messages1 = [
							'type' => 'location',
							'title'=>  "Winner",
							'address'=>  "446/71 ชั้น 3-5 อาคารปาร์คอเวนิว 2 ซ. ปรีดีพนมยงค์ 20/1, ถนนสุขุมวิท, แขวงพระโขนงเหนือ เขตวัฒนา กรุงเทพมหานคร, 10110 10110",
							 "latitude"=>  13.7239694,
    						"longitude"=>  100.5963188
							];
							$replyToken = $event['replyToken']; 
							$senddata =  [
								'replyToken' => $replyToken,
								'messages' => [$messages1],
							];
						}	

	 					
	 				

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
