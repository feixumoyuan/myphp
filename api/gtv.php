<?php

function fetchURL($url)

{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //不输出内容

    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;

}



$url = 'https://v.qq.com';



function home()

{

    $result = [

        'class' => [

            [

                'type_id' => 'tv',

                'type_name' => '电视剧'

            ],

            [

                'type_id' => 'movie',

                'type_name' => '电影'

            ],

            [

                'type_id' => 'cartoon',

                'type_name' => '动漫'

            ],

        ],

        'list' => [],

    ];



    $ret = category('movie', 1, 10);

    return (object) array_merge((array) $result, (array) $ret);



    //return $result;

}



function category($t, $pg = 1, $size = 15)

{

    $result = [

        'list' => [],

        'page' => $pg,

        'pagecount' => 10,

    ];



    global $url;

    $html = fetchURL($url . sprintf('/x/bu/pagesheet/list?listpage=1&pagesize=%d&_all=1&channel=%s&sort=75&offset=%d&append=1', $size, $t, ($pg - 1) * $size));



    $dom = new DOMDocument();

    @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

    $xpath = new DOMXPath($dom);



    foreach ($xpath->query('//div[@class="list_item"]') as $item) {

        $vod = [

            'vod_id' => $xpath->query(".//a[contains(@class, 'figure')]", $item)->item(0)->getAttribute('data-float'),

            'vod_name' => $xpath->query(".//a[contains(@class, 'figure')]", $item)->item(0)->getAttribute('title'),

            'vod_pic' => null,

            'vod_remarks' => $xpath->query(".//div[contains(@class, 'figure_desc')]", $item)->item(0)->getAttribute('title'),

        ];



        $pic = $xpath->query(".//img[contains(@class, 'figure_pic')]", $item)->item(0)->getAttribute('src');

        if (strpos($pic, '//') === 0) {

            $pic = 'https:' . $pic;

        }

        $vod['vod_pic'] = $pic;



        $result['list'][] = $vod;

    }



    $count = $xpath->query('//button[contains(@class, "page_num")][last()]');

    if ($count->length > 0) {

        $result['pagecount'] = $count[0]->textContent;

    }



    return $result;

}



function search($wd)

{

    $result = [

        'list' => [],

    ];



    global $url;

    $html = fetchURL($url . sprintf('/x/search/?stag=fypage&q=%s', urlencode($wd)));



    $dom = new DOMDocument();

    @$dom->loadHTML($html);

    $xpath = new DOMXPath($dom);



    foreach ($xpath->query('//div[contains(@class, "result_item_v")]') as $item) {

        $vod = [

            'vod_id' => $item->getAttribute('data-id'),

            'vod_name' => null,

            'vod_pic' => null,

            'vod_remarks' => null,

        ];



        $imgs = $xpath->query('.//a[contains(@class, "figure")]//img[@class="figure_pic"]', $item);

        if ($imgs->length > 0) {

            $vod['vod_name'] = $imgs[0]->getAttribute('alt');



            $pic = $imgs[0]->getAttribute('src');

            if (strpos($pic, '//') === 0) {

                $pic = 'https:' . $pic;

            }

            $vod['vod_pic'] = $pic;

        }



        $info = $xpath->query('.//a[contains(@class, "figure")]//span[@class="figure_info"]', $item);

        if ($info->length > 0) {

            $vod['vod_remarks'] = $info[0]->textContent;

        }



        $result['list'][] = $vod;

    }



    // foreach ($xpath->query('//ul[contains(@class, "figures_list")]//li[@class="list_item"]') as $li) {

    //     $vod = [

    //     ];

    // }



    return $result;

}



function detail()

{

    $t = isset($_GET['t']) ? $_GET['t'] : '';

    if ($t != '') {

        $pg = intval($_GET['pg']);

        return category($t, $pg);

    }



    $wd = isset($_GET['wd']) ? $_GET['wd'] : '';

    if ($wd != '') {

        return search($wd);

    }



    $result = [

        'list' => [],

    ];

    $ids = isset($_GET['ids']) ? $_GET['ids'] : '';

    if ($ids != '') {

        foreach (explode(',', $ids) as $id) {

            $html = fetchURL('https://m.v.qq.com/x/m/play?pagelet=1&cid=' . $id);

            $ret = json_decode($html, true);

            //echo $ret['html'];



            $dom = new DOMDocument();

            @$dom->loadHTML(mb_convert_encoding($ret['html'], 'HTML-ENTITIES', 'UTF-8'));

            $xpath = new DOMXPath($dom);



            $play = $xpath->query('//input[@id="play_sync"]');

            if ($play->length > 0) {

                $tmp = json_decode(urldecode($play[0]->getAttribute('value')));

                $cover = $tmp->playData->cover;



                $vod = [

                    'vod_id' => $id,

                    'vod_name' => $cover->title,

                    'vod_pic' => $cover->new_pic_vt,

                    'type_name' => '',

                    'vod_year' => $cover->year,

                    'vod_area' => $cover->area_name,

                    'vod_remarks' => $cover->timelong,

                    'vod_actor' => join(', ', $cover->leading_actor),

                    'vod_director' => join(', ', $cover->director),

                    'vod_content' => $cover->description,

                    'vod_play_from' => 'qq',

                    'vod_play_url' => '',

                ];



                if (!empty($cover->category_map)) {

                    $vod['type_name'] = end($cover->category_map);

                }



                $urls = [];

                foreach ($cover->video_ids as $index => $value) {

                    $urls[] = sprintf('第%d集$https://v.qq.com/x/cover/%s/%s.html', $index + 1, $id, $value);

                }

                $vod['vod_play_url'] = join('#', $urls);



                $result['list'][] = $vod;

            } else {

                continue;

            }

        }

    }

    return $result;

}



$ac = isset($_GET['ac']) ? $_GET['ac'] : '';





$result = null;

switch ($ac) {

    case '':

        $result = home();

        break;

    case 'detail':

        $result = detail();

        break;

    default:

        $result = [

            'code' => -1,

            'msg' => '错误请求'

        ];

        break;

}



header('Content-Type: application/json');

echo json_encode($result);
