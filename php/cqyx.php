<?php
//这个版本兼容性较好
//有问题发帖反馈到：https://discuz.mxdyeah.top/mxdyeah_discuz_thread-38-1-1.html
//By mxdyeah Copyright (c) 2021-2024 mxd.
//MIT 协议许可
//https://discuz.mxdyeah.top/mxdyeah_discuz_thread-38-1-1.html
$cityId = '5A';
$playId= $_GET['id'];
$relativeId = $playId;
$type='1';
$appId = "kdds-chongqingdemo";
$url ='http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId='.$playId.'&relativeId='.$relativeId.'&type=1';
$curl = curl_init();
$timestamps = number_format(microtime(true), 3, '', '');
$sign =md5('aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appId' . $appId . "cityId" . $cityId. "playId" . $playId . "relativeId" . $relativeId . "timestamps" . $timestamps . "type" . $type);
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'appId: kdds-chongqingdemo',
    'sign: '.$sign,
    'timestamps:'.$timestamps,
    'Content-Type: application/json;charset=utf-8'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$url = (json_decode($response));
header('location:'.$url->data->result->protocol[0]->transcode[0]->url);
?>
