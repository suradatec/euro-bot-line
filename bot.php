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
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
// $arrPostData['messages'][0]['text'] = "สวัสดีคนสวย";
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
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/dc1b392fc74330b87cc96e9082627f8d.jpg";
  $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/dc1b392fc74330b87cc96e9082627f8d.jpg";
}else if($arrJson['events'][0]['message']['text'] == "อินทิรา"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://www.img.in.th/images/dc1b392fc74330b87cc96e9082627f8d.jpg";
  $arrPostData['messages'][0]['previewImageUrl'] = "https://www.img.in.th/images/dc1b392fc74330b87cc96e9082627f8d.jpg"; 
}else if($arrJson['events'][0]['message']['text'] == "อุ๊"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "อยากมีผัว 555"; 
}else if($arrJson['events'][0]['message']['text'] == "ขอเข้าระบบ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "โปรดระบุ ID ตามด้วยเครื่องหมาย #";
}else if($arrJson['events'][0]['message']['text'] == "รูปภาพ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://s3-ap-southeast-1.amazonaws.com/picz.in.th/2017/10/03/instruments-childhood.jpg";
  $arrPostData['messages'][0]['previewImageUrl'] = "https://s3-ap-southeast-1.amazonaws.com/picz.in.th/2017/10/03/instruments-childhood.jpg";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
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
