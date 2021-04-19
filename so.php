<?php
//header('Content-Type:application/json; charset=utf-8');
ini_set( 'display_errors', 1); //错误信息
ini_set( 'display_startup_errors', 1); //php启动错误信息
ini_set( 'date.timezone', 'Asia/Shanghai');
error_reporting(- 1); //打印出所有的 错误信息
ini_set( 'error_log', dirname( __FILE__) . '/error_log----------------.txt'); //将出错信息输出到一个文本文件
session_start();
$sourl = $_GET['wd'];
$jsonData = json_encode( array());
$url='https://parse.xymov.net/api.php?wd='.$sourl;
$data = post_curls( $url, $jsonData); //返回json
echo($data);
//echo json_encode($data);
//exit($data);
/**
* POST请求https接口返回内容
* @param string $url [请求的URL地址]
* @param string $post [请求的参数]
* @return string
*/
function post_curls( $url, $data){ // 模拟提交数据函数
$curl = curl_init(); // 启动一个CURL会话
curl_setopt( $curl, CURLOPT_URL, $url); // 要访问的地址
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
curl_setopt( $curl, CURLOPT_USERAGENT, $_SERVER[ 'HTTP_USER_AGENT']); // 模拟用户使用的浏览器
curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
curl_setopt( $curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
curl_setopt( $curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
curl_setopt( $curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
curl_setopt( $curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
curl_setopt( $curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
$tmpInfo = curl_exec( $curl); // 执行操作
if ( curl_errno( $curl)) {
echo 'Errno'. curl_error( $curl); //捕抓异常
}
curl_close( $curl); // 关闭CURL会话
return $tmpInfo; // 返回数据，json格式
}
?>