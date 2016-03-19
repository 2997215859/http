<?php 
require('./Http.class.php');
$http = new Http("http://home.verycd.com/cp.php?ac=pm&op=send&touid=0&pmid=0");
//$http->setHeader("Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8");
//$http->setHeader("Accept-Encoding:gzip, deflate");
//$http->setHeader("Accept-Language:zh-CN,zh;q=0.8");
//$http->setHeader("Cache-Control:max-age=0");
//$http->setHeader("Connection:keep-alive");
//$http->setHeader("Content-Length:173");
$http->setHeader("Cookie:sid=95dc8f184d9a87d4ec42669cc84c0198007eb00f; member_id=20880048; member_name=18795882132; mgroupId=93; pass_hash=ff485d8ff09b415feef518c826f4902a; rememberme=false; Hm_lvt_c7849bb40e146a37d411700cb7696e46=1458349182; Hm_lpvt_c7849bb40e146a37d411700cb7696e46=1458349343; uchome_auth=89beIvpKfPwdCKoXpIsRxhxXPUn80pvX6awcVlSBQ1saTFrGhQBS9SqiWvK%2BH%2B8syp9up8KzFk425UYatOuyD6WEBgDHoA; uchome_loginuser=18795882132; uchome__refer=%2Fspace.php%3Fdo%3Dpm%26filter%3Dnewpm; uchome_sendmail=1; CNZZDATA1479=cnzz_eid%3D1512915095-1458346223-http%253A%252F%252Fwww.verycd.com%252F%26ntime%3D1458357847; dcm=1");
//$http->setHeader("Upgrade-Insecure-Requests:1");
//$http->setHeader("User-Agent:Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36");
//$http->setHeader("Referer:http://home.verycd.com/cp.php?ac=pm");
//$http->setHeader("Upgrade-Insecure-Requests:1");
$msg = array(
"username"=>"2997215859",
"message"=>"rilgoul",
"refer"=>"http://home.verycd.com/space.php?do=pm&filter=privatepm",
"pmsubmit"=>"true",
"pmsubmit_btn"=>"发送",
"formhash"=>"27522225"
	);

//$http->post($msg);
file_put_contents("./response.txt", $http->post($msg));

echo "ok";
/*cp.php?ac=pm&op=send&touid=0&pmid=0

username:2997215859
message:asdfasgaegthyregarf
refer:http://home.verycd.com/space.php?do=pm&filter=privatepm
pmsubmit:true
pmsubmit_btn:发送
formhash:27522225 */

// Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
// Accept-Encoding:gzip, deflate
// Accept-Language:zh-CN,zh;q=0.8
// Cache-Control:max-age=0
// Connection:keep-alive
// Content-Length:173
// Content-Type:application/x-www-form-urlencoded
// Cookie:sid=95dc8f184d9a87d4ec42669cc84c0198007eb00f; member_id=20880048; member_name=18795882132; mgroupId=93; pass_hash=ff485d8ff09b415feef518c826f4902a; rememberme=false; Hm_lvt_c7849bb40e146a37d411700cb7696e46=1458349182; Hm_lpvt_c7849bb40e146a37d411700cb7696e46=1458349343; uchome_auth=89beIvpKfPwdCKoXpIsRxhxXPUn80pvX6awcVlSBQ1saTFrGhQBS9SqiWvK%2BH%2B8syp9up8KzFk425UYatOuyD6WEBgDHoA; uchome_loginuser=18795882132; uchome__refer=%2Fspace.php%3Fdo%3Dpm%26filter%3Dnewpm; uchome_sendmail=1; CNZZDATA1479=cnzz_eid%3D1512915095-1458346223-http%253A%252F%252Fwww.verycd.com%252F%26ntime%3D1458357847; dcm=1
// Host:home.verycd.com
// Origin:http://home.verycd.com
// Referer:http://home.verycd.com/cp.php?ac=pm
// Upgrade-Insecure-Requests:1
// User-Agent:Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36