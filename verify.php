<?php
$access_token = 'jtqPqB5fZ6o4qDNivmswM07ymMVt8Sd0JFzW5NzSHApplakd3v/CP/KwrzSIZLJ9nrhhgfJBJ7iXjSdDVks4jkjHvP3kL767FnvjAJ0zhMPiF7EkROzBRtpY9NQ++WMFVt4WY+RHePqqiprDW9bjZgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
