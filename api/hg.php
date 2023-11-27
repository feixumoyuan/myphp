<?php
$id = isset($_GET['id'])?$_GET['id']:'hljheb1';
$n = array(
  'hljheb1' => '0362', //哈尔滨新闻综合
  'hljys' => '0356', //黑龙江影视
  'hljwt' => '0357', //黑龙江文体
  'hljds' => '0358', //黑龙江都市
  'hljxw' => '0359', //黑龙江新闻法治
  'hljnk' => '0360', //黑龙江农业科教
  'hljse' => '0361', //黑龙江少儿
  'jmsxwzh' => '0373', //佳木斯新闻综合
  'qqhexwzh' => '0371',//齐齐哈尔新闻综合
  'qqhejjfz' => '0372',//齐齐哈尔经济法治
  'mdjxwzh' => '0374',//牡丹江新闻综合
  'hhxwzh' => '0375',//黑河新闻综合
  'dqxwzh' => '0377',//大庆新闻综合
  'dqgg' => '0378',//大庆公共频道
  'dqjy' => '0376',//大庆教育
  'jxxwzh' => '0380',//鸡西新闻综合
  'jxgg' => '0379',//鸡西公共
  'hgxwzh' => '0381',//鹤岗新闻综合高清
  'ycxwzh' => '0382',//伊春新闻综合
  'syszh' => '0383',//双鸭山综合
  'sysgg' => '0384',//双鸭山公共
  'qthzh' => '0385',//七台河综合
  'qthgg' => '0386',//七台河公共
  'dxalxw' => '0387',//大兴安岭新闻综合
  'mhzh' => '0507',//漠河综合
);

header('location:'.'http://112.84.188.30/live.local10.ctlcdn.com/0000011024'.$n[$id].'_1/playlist.m3u8?CONTENTID=0000011024'.$n[$id].'_1&AUTHINFO=FABqh274XDn8fkurD5614t%2B1RvYajgx%2Ba3PxUJe1SMO4OjrtFitM6ZQbSJEFffaD35hOAhZdTXOrK0W8QvBRom%2BXaXZYzB%2FQfYjeYzGgKhP%2Fdo%2BXpr4quVxlkA%2BubKvbU1XwJFRgrbX%2BnTs60JauQUrav8kLj%2FPH8LxkDFpzvkq75UfeY%2FVNDZygRZLw4j%2BXtwhj%2FIuXf1hJAU0X%2BheT7g%3D%3D&USERTOKEN=eHKuwve%2F35NVIR5qsO5XsuB0O2BhR0KR');
?>
