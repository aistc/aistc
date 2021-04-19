<?php
error_reporting(0);
header("Access-Control-Allow-Origin:*");
header("Content-type:application/json; charset=utf-8");
$www_vvhan_com = isset($_GET['url']) && $_GET['url'] != "" ? $_GET['url'] : exit(json_encode(array("success" => false, "message" => "参数不完整"), JSON_UNESCAPED_UNICODE));
$www_vvhan_com_url = get_headers($www_vvhan_com, true)["location"];
preg_match_all('/video\/(.*?)\/\?region/i', $www_vvhan_com_url, $out);
$www_vvhan_com_Arr = json_decode(www_Vvhan_Com("https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids={$out[1][0]}"), true);
preg_match_all('/href="(.*?)">Found/i', www_Vvhan_Com(str_replace('playwm', 'play', $www_vvhan_com_Arr['item_list'][0]["video"]["play_addr"]["url_list"][0])), $www_vvhan_com_OutDatas);
$www_vvhan_com_Jsons = array(
    "success" => true,
    "info" => [
        'title' => $www_vvhan_com_Arr['item_list'][0]["share_info"]["share_title"],
        'cover' => $www_vvhan_com_Arr['item_list'][0]['video']["origin_cover"]["url_list"][0],
        'url' => $www_vvhan_com_OutDatas[1][0]
    ]
);
exit(json_encode($www_vvhan_com_Jsons, JSON_UNESCAPED_UNICODE));
function www_Vvhan_Com($www_vvhan_com)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $www_vvhan_com);
    curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $www_vvhan_com_OutPut = curl_exec($ch);
    curl_close($ch);
    return $www_vvhan_com_OutPut;
}
?>