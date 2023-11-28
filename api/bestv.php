<?php
    $cache = new Cache(3600,"cache/");
    $playUrl = $cache->get('cctv4k_cache');
    if(!$playUrl)
    {
        $bstrURL = "https://ytpvdn.cctv.cn/cctvmobileinf/rest/cctv/videoliveUrl/getstream";
        $postData = 'appcommon={"ap":"cctv_app_tv","an":"央视投屏助手","adid":"1234123122","av":"1.1.7"}&url=http://live-tp4k.cctv.cn/live/4K0219.stream/playlist.m3u8';
        //4K高清 = 4K10M.stream //4K超高清 = 4K0219.stream
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $bstrURL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("User-Agent: cctv_app_tv","Referer: api.cctv.cn","UID: 1234123122"));
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $data = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($data);
        $playUrl = $obj->url;
        $playUrl = str_replace("playlist.m3u8","1.m3u8",$playUrl);
        $cache->put('cctv4k_cache',$playUrl);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $playUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER,array("User-Agent: cctv_app_tv","Referer: api.cctv.cn","UID: 1234123122"));
    $data = curl_exec($ch);
    curl_close($ch);
    $data = preg_replace('/(.*?.ts)/i',"http://livews-tp4k.cctv.cn/live/4K0219.stream/$1",$data);
    header("Content-Disposition:attachment;filename=playlist.m3u8");
    echo $data;
    exit;

    // 以下缓存类来自互联网，请确保cache目录存在以及读写权限 //
    class Cache {

        private $cache_path;
        private $cache_expire;
        public function __construct($exp_time=3600,$path="cache/"){
            $this->cache_expire=$exp_time;
            $this->cache_path=$path;
        }

        private function fileName($key){  return $this->cache_path.md5($key); }
        public function put($key, $data){

            $values = serialize($data);
            $filename = $this->fileName($key);   
            $file = fopen($filename, 'w');
            if ($file){

                fwrite($file, $values);
                fclose($file);
            }
            else return false;
        }
        public function get($key){
            $filename = $this->fileName($key);
            if (!file_exists($filename) || !is_readable($filename)){ return false; }
            if ( time() < (filemtime($filename) + $this->cache_expire) ) {
                $file = fopen($filename, "r");
                if ($file){
                    $data = fread($file, filesize($filename));
                    fclose($file);
                    return unserialize($data);
                }
                else return false;
            }
            else return false;
        }
    }
?>



