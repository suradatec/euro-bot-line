<?php
$strAccessToken = 'RxcbyNHwKVc0T8e0YGGHW8PKVGQPMgloy9lvzSAqZLudJDFsmg4L33gcxgJ7ESKfD+D7vDaGvKu7CJT8D9kZbrmajy6ve5COhRtGB2k6wF5omWM9L2kLGkCwp4SYK2YvArdNxlTS/n1bpDmB/pEL7wdB04t89/1O/w1cDnyilFU=';
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
//  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
 $arrPostData['messages'][0]['text'] = "สวัสดีคนสวย";
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันชื่อ eurobot";
}else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
}else if($arrJson['events'][0]['message']['text'] == "บุญญาพร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ผัวชื่อ บอย 555";
}else if($arrJson['events'][0]['message']['text'] == "ขอเข้าระบบ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "โปรดระบุ ID ตามด้วยเครื่องหมาย #";
}else if($arrJson['events'][0]['message']['text'] == "รูปภาพ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
//Get the file
//$content = file_get_contents("http://www.google.co.in/intl/en_com/images/srpr/logo1w.png");
//Store in the filesystem.
//$fp = fopen("/picture/image.jpg", "w");
//fwrite($fp, $content) 
//fclose($fp); 
  $arrPostData['messages'][0]['image']['originalContentUrl'] = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
//  $arrPostData['messages'][0]['previewImageUrl'] = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
