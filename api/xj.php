<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'xjws';
$n = [
'xjws' =>  0,//新疆卫视
'xwwy' =>  1,//维语新闻综合
'xwhy' =>  2,//哈语新闻综合
'xjzy' =>  3,//汉语综艺
'yswy' =>  4,//维语影视
'xjjj' =>  5,//汉语**生活
'zyhy' =>  6,//哈语综艺
'jjwy' =>  7,//维语*济生活
'xjty' =>  8,//汉语体育健康
'xjxx' =>  9,//汉语信息服务
'xjse' => 10,//少儿频道
];
$url = 'https://www.xjtvs.com.cn/bvradio_app/service/cms?functionName=getChannel&stationID=100&_=1686808782787';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_REFERER,'https://www.xjtvs.com.cn/live/xjtv.shtml');
$res = curl_exec($ch);  
curl_close($ch);
//var_dump ($res);
$m3u8 = json_decode($res)[$n[$id]]->playUrl;
//echo $m3u8;
//header('Location:'.$m3u8);
//后面这段代码可以删除（频道高峰期会随机不定时打不开，加个判断），去掉//header('Location:'.$m3u8);的//即可使用。
$ch = curl_init($m3u8);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_REFERER,'https://www.xjtvs.com.cn/live/xjtv.shtml');
$play = curl_exec($ch);  
curl_close($ch);
if(strpos($play,'.ts') !== false){ 
header('Location:'.$m3u8);
}else{
header('Location:https://mp4.vjshi.com/2020-12-03/8f09e994ee947a7d4b1da80097395a04.mp4');
}
