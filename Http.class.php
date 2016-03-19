<?php
//http请求类接口
interface Proto{
	//连接url
	function conn($url);
	//发送GET请求
	function get();
	//发送POST请求
	function post();
	//关闭连接
	function close();
}

class Http implements Proto{
	const CRLF = "\r\n";//carriage return line feed
	protected $url = array();
	protected $line = array();
	protected $header = array();
	protected $body = array();
	protected $fh = null;
	protected $version = 'HTTP/1.1';
	protected $errno = -1;
	protected $errstr = '';
	protected $response = '';
	public function __construct($url)
	{
		$this->conn($url);
		$this->setHeader("Host:".$this->url["host"]);
	}
    //此方法负责写请求行
	protected function setLine($method){
		$this->line[] = "$method"." ".$this->url['path']."?".$this->url['query']." ".$this->version;
		// echo $this->line[0];
	}
	//此方法负责写请求头
	public function setHeader($headerLine){
		$this->header[] = $headerLine;
	}
	//此方法负责写主体信息
	protected function setBody($body){
		//$this->body = array.merge($this->body,$body);
		$this->body[] = http_build_query($body);
		//echo $this->body[0];
	}
	//连接url
	public function conn($url){
		$this->url = parse_url($url);
	    //print_r($this->url);
		//判断端口
		if(!isset($this->url['port'])){
			$this->url['port'] = 80;
		}
		$this->fh = fsockopen($this->url['host'],$this->url['port'],$this->errno,$this->errstr,3);
	}
	//构造GET请求
	public function get(){
		$this->setLine("GET");
		$this->request();
		return $this->response;
	}
	//构造POST请求
	public function post($body = array()){

		//设置POST请求行
		$this->setLine("POST");
		//设置头消息
	    $this->setHeader("Content-type:application/x-www-form-urlencoded");
	    //echo $this->header[1];
		//设置主体信息，比get要多一些设置
		$this->setBody($body);
		$this->setHeader("Content-length:".strlen($this->body[0]));
		//echo $this->header[2];
		$this->request();
		return $this->response;
	}
	//真正请求
	public function request(){
		//把请求行和body信息放在一个数组中，便于拼接
		$req = array_merge($this->line,$this->header,array(''),$this->body,array(''));
		
		$req = implode(self::CRLF, $req);
		//echo $req;exit;
		//print_r($req);
		fwrite($this->fh,$req);
		while(!feof($this->fh)){
			$this->response.=fread($this->fh,1024);
		}
		$this->close();//关闭连接
	}
	//关闭连接
	public function close(){
		//fclose($this->fh);
	}
}

// $url = "http://news.163.com/16/0317/20/BICRPR0400014PRF.html";
// $http = new http($url);
//$str = str_shuffle("asdfasdfsd");
//$tit = substr($str,0,5);
//$content = substr($str,0,8);
//echo $http->get();
//print_r($http);
//echo $http->post(array("tit"=>"$tit","content"=>$content,"submit"=>"留言"));