<?php
error_reporting(0);
$cityId = '5A';
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    //央视
    "cctv1" => ["cctv1HD"], //CCTV1综合
    "cctv2" => ["cctv2HD"], //CCTV2财*
    "cctv3" => ["cctv3HD"], //CCTV3综艺
    "cctv4" => ["cctv4HD"], //CCTV4中文国际
    "cctv5" => ["cctv5HD"], //CCTV5体育
    "cctv5p" => ["cctv5SportHD"], //CCTV5+体育赛事
    "cctv6" => ["cctv6HD"], //CCTV6电影
    "cctv7" => ["cctv7HD"], //CCTV7国防军事
    "cctv8" => ["cctv8HD"], //CCTV8电视剧
    "cctv9" => ["cctv9HD"], //CCTV9纪录
    "cctv10" => ["cctv10HD"], //CCTV10科教
    "cctv11" => ["cctv11HD"], //CCTV11戏曲
    "cctv12" => ["cctv12HD"], //CCTV12社会与法
    "cctv13" => ["CCTVNewsHD"], //CCTV13新闻
    "cctv14" => ["cctvseHD"], //CCTV14少儿
    "cctv15" => ["cctv15HD"], //CCTV15音乐
    "cctv16" => ["cctv16HD"], //CCTV16奥林匹克
    "cctv17" => ["cctv17HD"], //CCTV17农业农村
    "cctv4k" => ["CCTV4K"], //CCTV4K 高清
    "cctv16-4k" => ["CCTV16_4K"], //CCTV16-4K 高清

    "bqkj" => ["bqkjHD"], //CCTV兵器科技
    "dyjc" => ["diyijuchangHD"], //CCTV第一剧场
    "hjjc" => ["hjjcHD"], //CCTV怀旧剧场
    "fyjc" => ["fyjcHD"], //CCTV风云剧场
    "fyyy" => ["fyyyHD"], //CCTV风云音乐
    "fyzq" => ["fyzqHD"], //CCTV风云足球
    "whjp" => ["yswhHD"], //CCTV央视文化精品
    "nxss" => ["nvxing"], //CCTV女性时尚
    "gefwq" => ["golfHD"], //CCTV高尔夫网球
    "ystq" => ["ystqHD"], //CCTV央视台球
    "yggw" => ["yggw"], //CCTV央广购物
    "zsgw" => ["ysgw"], //CCTV中视购物

    "zxs" => ["qicai"], //种养新影-中学生
    "fxzl" => ["faxian"], //种养新影-发现之旅
    "lgs" => ["gushi"], //种养新影-老故事

    "sh" => ["shuhua"], //书画
    "zgtq" => ["tianqiSD"], //中国天气

    "cgtn" => ["cgtnSD"], //CGTN
    //中国教育
    "cetv1" => ["cetv-1SD"], //CETV1中教1台
    "cetv4" => ["cetv-4SD"], //CETV4中教4台
    "zqjy" => ["zaojiaoHD"], //CETV早期教育
    //CHC系列
    "chcgq" => ["chcgqdyHD"], //CHC高清电影
    "chcdz" => ["chcdzdyHD"], //CHC动作电影
    "chcjt" => ["chcjtyyHD"], //CHC家庭影院
    //卫视
    "bjws" => ["beijingHD"], //北京卫视
    "dfws" => ["shanghaiHD"], //东方卫视
    "tjws" => ["tianjinHD"], //天津卫视
    "cqws" => ["chongqingHD"], //重庆卫视
    "hljws" => ["heilongjiangHD"], //黑龙江卫视
    "jlws" => ["jilinHD"], //吉林卫视
    "lnws" => ["liaoningHD"], //辽宁卫视
    "nmws" => ["neimengkuSD"], //内蒙古卫视
    "nxws" => ["ningxia"], //宁夏卫视
    "qhws" => ["qinghaiSD"], //青海卫视
    "hbws" => ["hebeiSD"], //河北卫视
    "sxiws" => ["shanxiSD"], //山西卫视
    "ahws" => ["anhuiSD"], //安徽卫视
    "hnws" => ["henanHD"], //河南卫视
    "hubws" => ["hubeiSD"], //湖北卫视
    "hunws" => ["hunanHD"], //湖南卫视
    "jxws" => ["jiangxiHD"], //江西卫视
    "jsws" => ["jiangsuHD"], //江苏卫视
    "zjws" => ["zhejiangHD"], //浙江卫视
    "dnws" => ["dongnanHD"], //东南卫视
    "gdws" => ["guangdongHD"], //广东卫视
    "szws" => ["shenzhenHD"], //深圳卫视
    "gxws" => ["guangxiHD"], //广西卫视
    "ynws" => ["yunnanSD"], //云南卫视
    "gzws" => ["guizhouHD"], //贵州卫视
    "scws" => ["sichuanHD"], //四川卫视
    "xjws" => ["xinjiangSD"], //新疆卫视
    "btws" => ["bingtuanSD"], //兵团卫视
    "xzws" => ["xizangSD"], //西藏卫视
    "hinws" => ["hainanSD"], //海南卫视
    "ssws" => ["sanshaSD"], //三沙卫视
    //北京
    "bjjskj" => ["bjayjsSD"], //北京纪实科教
    "bjkk" => ["bjkakuSD"], //北京卡酷
    "zhtc" => ["techan"], //中华特产
    "sthj" => ["shengtai"], //生态环境
    "shdy" => ["diaoyu"], //四海钓鱼
    "cmpd" => ["doxtv"], //车迷频道
    "bxjk" => ["jiankangSD"], //百姓健康
    "hqqg" => ["car"], //环球奇观
    "hqly" => ["huanqiulvyou"], //环球旅游
    "yybb" => ["youxi"], //优优宝贝
    "jshwjx" => ["jusha"], //聚鲨环球精选
    //上海
    "dfcj" => ["dfcj"], //东方财*
    "hxjc" => ["hxjc_4K"], //欢笑剧场
    "dsjc" => ["dsjcHD"], //都市剧场
    "mlxq" => ["mlzqHD"], //魅力足球
    "dmxc" => ["dmxcHD"], //动漫秀场
    "yxfy" => ["yxfyHD"], //游戏风云
    "shss" => ["shenghuo"], //生活时尚
    "fztd" => ["fazhi"], //法治天地
    "jsxt" => ["jinse"], //金色学堂
    //重庆
    "cqxw" => ["CQTVNewsHD"], //重庆新闻
    "cqkj" => ["CQTVkejiaoHD"], //重庆科教
    "cqys" => ["cqyingshiHD"], //重庆影视
    "cqwtyl" => ["cqwtylHD"], //重庆文体娱乐
    "cqse" => ["cqseHD"], //重庆少儿
    "cqsssh" => ["cqssgwHD"], //重庆时尚生活
    "cqxnc" => ["cqggncHD"], //重庆新农村
    "cqshyf" => ["CQTVTrendyHD"], //重庆社会与法
    "cqyd" => ["mryyHD"], //重庆移动
    "cqqm" => ["cqcarSD"], //重庆汽摩
    "cgrm" => ["cqrongmei"], //重广融媒
    "akds" => ["aikanHD"], //爱看导视
    "hczh" => ["hechuan"], //合川综合
    "cszh" => ["changshou"], //长寿综合
    "yyzh" => ["youyang"], //酉阳综合
    "yunyzh" => ["jiangjinHD"], //云阳综合
    "tlzh" => ["tongliangzongheHD"], //铜梁综合
    //其他
    "jygw" => ["jygw"], //家有购物
    "xdm" => ["dongman"], //新动漫
    "zqfw" => ["jiazheng"], //证券服务
    "sdjy" => ["sdjiaoyuSD"], //山东教育
    "sctx" => ["soucang"], //收藏天下
    "gxpd" => ["guoxue"], //国学频道
    "klcd" => ["klcdHD"], //快乐垂钓
    "jykt" => ["jinyingSD"], //金鹰卡通
    "xfpy" => ["xianfeng"], //先锋乒羽
    "fsgw" => ["fsgw"], //风尚购物
    "cftx" => ["caifu"], //财富天下
    "tywq" => ["weiqi"], //天元围棋
    "sypd" => ["sheying"], //摄影频道
    "qsjl" => ["qsjlHD"], //求索纪录
];
// 定义 IP 范围数组
$ipRanges = array(
    '27.144.0.0|27.144.255.255',
    '117.59.0.0|117.59.255.255',
    '125.62.0.0|125.62.63.255',
    '218.244.0.0|218.244.31.255'
);

// 解析 IP 范围并生成随机 IP
function generateRandomIP($ipRanges)
{
    $chosenRange = $ipRanges[array_rand($ipRanges)]; // 随机选择一个 IP 范围
    list($start, $end) = explode('|', $chosenRange); // 分解开始和结束 IP 地址

    // 将 IP 地址转换为整数表示以便进行随机化
    $start = ip2long($start);
    $end = ip2long($end);

    // 生成随机 IP 地址
    $ipAddress = long2ip(rand($start, $end));

    return $ipAddress;
}

// 生成随机 IP 地址并输出
$ipAddress = generateRandomIP($ipRanges);

$playId = $n[$id][0];
$relativeId = $playId;
$type = '1';
$appId = "kdds-chongqingdemo";
$url = 'http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId=' . $playId . '&relativeId=' . $relativeId . '&type=1';
$curl = curl_init();
$timestamps = round(microtime(true) * 1000);
$sign = md5('aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appId' . $appId . "cityId" . $cityId . "playId" . $playId . "relativeId" . $relativeId . "timestamps" . $timestamps . "type" . $type);
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
        'sign: ' . $sign,
        'timestamps:' . $timestamps,
        'Content-Type: application/json;charset=utf-8',
        'X-Forwarded-For: ' . $ipAddress, // 使用 X-Forwarded-For 标头来设置 IP 地址
        'Client-IP: ' . $ipAddress
    ),
));

$response = curl_exec($curl);

if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

curl_close($curl);

if (!$response) {
    echo 'Error: No response received from server';
}

$url = (json_decode($response));

if (!$url) {
    echo 'Error: Failed to parse JSON response';
}

$codes = isset($url->data->result->protocol[0]->transcode[0]->url) ? $url->data->result->protocol[0]->transcode[0]->url : '';

if (!$codes) {
    echo 'Error: No video URL found in response';
}

$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $codes);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($ch, CURLOPT_TIMEOUT, 0); // 设置超时时间
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Forwarded-For: ' . $ipAddress, // 使用 X-Forwarded-For 标头来设置 IP 地址
    'Client-IP: ' . $ipAddress // 也可以尝试使用 Client-IP 标头
));
// Set the User-Agent header
$userAgent = $_SERVER['HTTP_USER_AGENT'];
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// Execute cURL session and capture the final URL
curl_exec($ch);

// Get the final URL after following redirects
$finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
// // Get the HTTP status code
// $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// Close cURL session
curl_close($ch);

header("Content-Type: application/vnd.apple.mpegurl");
header('location:' . $finalUrl);
exit;



