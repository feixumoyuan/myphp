<?php
$id = isset($_GET['id']) ? $_GET['id'] : 'zh';
$n = [
    'zh' => 217, //七台河新闻综合
    'gg' => 14642, //七台河民生科教
];
$url = "https://qthsr.dbw.cn//television/content_{$n[$id]}.shtml";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$pattern = '/"videourl":"([^"]+)"/';
preg_match($pattern, $response, $matches);
$playUrl = $matches[1];
header("Location: $playUrl");
exit;
?>



