<?php
$id = isset($_GET['id'])?$_GET['id']:'jntv';
$a = [
   'jntv' => 556,//金牛电视台
   'slzh' => 557,//双流综合
   'wjtv' => 559,//温江电视台
   'gxtv' => 722,//高新电视台
   'xjtv' => 760,//新津电视台
   'dyxwzh' => 790,//大邑综合
   'pztv' => 796,//彭州电视台
   'pjtv' => 828,//蒲江电视台
   'jjtv' => 1541,//锦江电视台
   'jttv' => 840,//金堂电视台
   'pdxwzh' => 845,//郫都新闻综合
   'lqzh' => 882,//龙泉综合
   'qytv' => 910,//青羊电视台
   'qbjtv' => 966,//青白江电视台
   'cztv' => 1257,//崇州电视1套
   'djytv' => 1314,//都江堰电视台
   'chyx' => 1319,//成华有线
   'qltv' => 1427,//邛崃电视台
   'whtv' => 1766,//武侯电视台
   'xdzh' => 1712,//新都电视台
   'jyxwzh' => 1698,//简阳新闻综合
   'cdxwzh' => 1,//成都新闻综合
   'cdjjzx' => 2,//成都经济资讯
   'cddssh' => 3,//成都都市生活
   'cdyswy' => 45,//成都影视文艺
   'cdgg' => 5,//成都公共
   'cdse' => 6,//成都少儿
   'cdss' => 9,//成都时尚
   'cdqc' => 10,//成都汽车
   'cdzxxgx' => 11,//成都资讯新干线
   'cdmsly' => 12,//成都美食旅游
   'cdrcxf' => 15,//成都蓉城先锋
   'cdmrgw' => 18,//成都每日购物
];
if(!empty($a[$id]))
$d = file_get_contents("http://mob.api.cditv.cn/show/192-".$a[$id].".html");
$playurl = json_decode($d)->data->ios_url;
header('Location:'.$playurl);
//echo $playurl;
?>
