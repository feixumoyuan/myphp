<?php
$id = isset($_GET['id'])?$_GET['id']:'gxpd';
$n = array(
'hnws' => 145,//河南卫视
'hnds' => 141,//河南都市
'hnms' => 146,//河南民生
'hmfz' => 147,//河南法治
'hndsj' => 148,//河南电视剧
'hnxw' => 149,//河南新闻
'htgw' => 150,//欢腾**
'hngg' => 151,//河南公共
'hnxc' => 152,//河南乡村
'hngj' => 153,//河南国际
'hnly' => 154,//河南梨园
'wwbk' => 155,//文物宝库
'wspd' => 156,//武术世界
'jczy' => 157,//睛彩中原
'ydxj' => 163,//移动戏曲
'xsj' => 183,//象视界
'gxpd' => 194,// 国学频道
);
$t = time();
$sign = hash('sha256','6ca114a836ac7d73'.$t);
$ch = curl_init('https://pubmod.hntv.tv/program/getAuth/live/class/program/11');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['timestamp:'.$t, 'sign:'.$sign,]);
$d = curl_exec($ch);
curl_close($ch);
$j = json_decode($d);
for($i=0;$i<count($j);$i++){
   if($n[$id] == $j[$i] -> cid)
       $playurl = $j[$i] -> video_streams[0];
       }
header('Location:'.$playurl);
//echo $playurl;
?>



