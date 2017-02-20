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
						// 	if($event['message']['text'] == "/help"){
						//
						//
	 				// 		$text = "คุณสามารถ พิมพ์ว่า /help เพื่อลิสดูคำสั่งที่สามารถทำงานให้คุณได้ค่ะ";
	 				//
						// 	 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '3',
						// 	'stickerId' => '180'
	 				// 		];
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$messages2 = [
						// 	'type' => 'text',
						// 	'text' => "1. /address [ini3] ขอที่อยู่ บริษัทอินิทรี\n2. /location [winner]ชื่อที่ตั้งบริษัทเกมส์วินเนอร์\n3. [ใส่ชื่อคนที่ต้องการเรียก]"
						// 	];
						//
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$sticker,$messages1,$messages2],
						// 	];
						// }else if($event['message']['text'] == "/address ini3"){
						//
						// 	$text = "149 อาคารแกแล็คซี่เพลส ชั้น 8 (ห้อง 8/1-8/2) ถนนนนทรี แขวงช่องนนทรี เขตยานนาวา กรุงเทพฯ 10120";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "/location winner"){
						//
						// 	$messages1 = [
						// 	'type' => 'location',
						// 	'title'=>  'Winner Online Co.th',
						// 	'address'=>  '446/71 ชั้น 3-5 อาคารปาร์คอเวนิว 2',
						// 	'latitude'=>  13.7239694,
    				// 		'longitude'=>  100.5963188
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "/location ini3"){
						//
						// 	$messages1 = [
						// 	'type' => 'location',
						// 	'title'=>  'Ini3 Digital Co.,LTD.',
						// 	'address'=>  '149 ถนน นนทรี Yan Nawa',
						// 	'latitude'=>  13.6977828,
    				// 		'longitude'=>  100.5384816
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "/location garena"){
						//
						// 	$messages1 = [
						// 	'type' => 'location',
						// 	'title'=>  'Garena Online (Thailand) Co.,Ltd.',
						// 	'address'=>  'Level 24, AIA Capital Center Building',
						// 	'latitude'=>  13.7644754,
    				// 		'longitude'=>  100.5660648
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "แก๊ป"){
						//
						// 	$text = "เฮ้ยยย ตีบอสอยู่ รอแปป";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "กาย"){
						//
						// 	$text = "ดูบอลอยู่ รอก่อน";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "ทัต"){
						//
						// 	$text = "มุงใจเย็นดิ กุขอทำตรงนี้ก่อน";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "พี่วิท"){
						//
						// 	$text = "แปปนึง กำลังดัน payload";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }
						// else if($event['message']['text'] == "แม็ก"){
						//
						// 	$text = "คุณแม็กสุดหล่อมีคนกำลังเรียกค่ะ";
						// 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '3',
						// 	'stickerId' => '181'
	 				// 		];
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1,$sticker],
						// 	];
						// }else if($event['message']['text'] == "แมก"){
						//
						// 	$text = "คุณแม็กสุดหล่อมีคนกำลังเรียกค่ะ";
						// 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '3',
						// 	'stickerId' => '181'
	 				// 		];
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1,$sticker],
						// 	];
						// }else if($event['message']['text'] == "แกป"){
						//
						// 	$text = "เฮ้ยยย ตีบอสอยู่ รอแปป";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "พี่วิทครับ"){
						//
						// 	$text = "แปปนึง กำลังดัน payload";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "พี่วิทคับ"){
						//
						// 	$text = "แปปนึง กำลังดัน payload";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "กาก"){
						//
						// 	$text = "เออ กากสัส";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "แก๊ปไปปะ"){
						//
						// 	$text = "อย่าถามแก๊ปเลย รู้ๆกันอยู่";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "แก๊ปไปป่ะ"){
						//
						// 	$text = "อย่าถามแก๊ปเลย รู้ๆกันอยู่";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "ทัตไปปะ"){
						//
						// 	$text = "ไม่ไป กุรีบกลับ";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "ทัตไปป่ะ"){
						//
						// 	$text = "ไม่ไป กุรีบกลับ";
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }else if($event['message']['text'] == "555"){
						//
						// 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '1',
						// 	'stickerId' => '110'
	 				// 		];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$sticker],
						// 	];
						// }else if($event['message']['text'] == "5555"){
						//
						// 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '1',
						// 	'stickerId' => '110'
	 				// 		];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$sticker],
						// 	];
						// }else if($event['message']['text'] == "55555"){
						//
						// 	$sticker = [
						// 	'type' => 'sticker',
						// 	'packageId' => '1',
						// 	'stickerId' => '110'
	 				// 		];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$sticker],
						// 	];
						// }else if($event['message']['text'] == "/giphy".' '.$event['message']['text']){
						//
						// 	$text =  "/giphy".' '.$event['message']['text'];
						// 	$messages1 = [
						// 	'type' => 'text',
						// 	'text' => $text
						// 	];
						// 	$replyToken = $event['replyToken'];
						// 	$senddata =  [
						// 		'replyToken' => $replyToken,
						// 		'messages' => [$messages1],
						// 	];
						// }
						//

	 					 $data=file_get_contents("http://dict.longdo.com/mobile.php?search=".$keyword);

						$text = strip_tags($data,"<a><table><td><tr><font><style><meta><br>");

							$messages1 = ['type' => 'text','text' => $text];

							$replyToken = $event['replyToken'];
							$senddata =  ['replyToken' => $replyToken,'messages' => $messages1];
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
