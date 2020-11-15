<?php

echo "Chatchai ";
exit;

define('API_ACCESS_KEY', 'AAAAg2r2EMA:APA91bFZpe0_PGbZ4710RTBKKUClTUlAKaJp9_PDBY7DzXNbMSpoSYKiiMBv0qtowMZw12_56MbJfTjwzzj60YHdMp5SUPGPPvJsAQGQkbMTQpIZuZlQjifZ66Nx86rlyeqBljMPEJyp');

$fcmUrl = 'https://fcm.googleapis.com/fcm/send';
$token = "e44Ls-4CSLW3rK_SZ32nxW:APA91bGM1jvjmJM_bg8Qp37C4sS2TaXBPvjpKitFad4F9_LeQ4p8pzFAEqflWYn0OsS2ASKRwB7S_vsWJz-wnRYOcujDRfQ-6f0ulebJpymsiLpxEeWmsUO2KgkFMaTRs6NVguLxEXgs";


$notification = [
//write title, description and so on
'title' =>'title',
'body' => 'body of message.',
'icon' =>'myIcon', 
'sound' => 'mySound'
];

$extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

$fcmNotification = [
//'registration_ids' => $tokenList, //multple token array
'to'        => $token, //single token
'notification' => $notification,
'data' => $extraNotificationData
];

$headers = [
'Authorization: key=' . API_ACCESS_KEY,
'Content-Type: application/json'
];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$fcmUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
$result = curl_exec($ch);
curl_close($ch);


echo $result;

?>
