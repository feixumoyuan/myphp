<?php
$id = isset($_GET['id'])?$_GET['id']:'zzxw';
$n = [
    "zzxw" => 10,//郑州新闻综合
    "zzsd" => 11,//郑州商都频道
    "zzwt" => 12,//郑州文体旅游
    "zzys" => 13,//郑州影视戏曲
    "zzfn" => 14,//郑州妇女儿童
    "zzds" => 15,//郑州都市生活
];
$m3u8 = json_decode(file_get_contents("https://mapi.zztv.tv/api/v1/channel_detail.php?channel_id={$n[$id]}"))[0]->channel_stream[0]->m3u8;
header('location:'.$m3u8);
//print_r($m3u8);
?>
