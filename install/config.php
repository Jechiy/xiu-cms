<?php
//配置文件
$config = array();
$config['S_DB_TYPE'] = '';
$config['S_DB_PATH'] = '';
$config['S_DB_NAME'] = '';
$config['S_DB_USER'] = '';
$config['S_DB_PWD'] = '';
$config['S_DB_PREFIX'] = '';
$config['S_ROOT'] = '';
$config['S_TPL_PATH'] = 'templates/default/';
$config['S_LANG'] = 'zh-cn';
$config['S_URL_PREFIX'] = '?/';
$config['S_URL_SUFFIX'] = 'index.html';
$config['S_URL_REWRITE'] = 0;
$config['S_HALF_STATIC'] = 0;
$config['S_SHAM_STATIC'] = 0;
$config['S_PURE_STATIC'] = 0;
$config['S_SESSION'] = 1;
$config['S_FLASH'] = 0;
$config['S_MULTILINGUAL'] = 0;
$config['S_BROWSER'] = 'pc';
$config['S_SERVER_URL'] = 'http://data.sinsiu.com/';
	
reset_config();
	
function reset_config()
{
	global $config,$re_config;
	$root = str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME']));
	if($root != '/' && $root != '')
	{
		$root .= '/';
	}
	$re_config['S_ROOT'] = $root;
	
	include('include/browser.class.php');
	$obj = new browser();
	$re_config['S_BROWSER'] = $obj->check_browser();
	
	foreach($re_config as $key => $value)
	{
		$config[$key] = $value;
	}
	foreach($config as $key => $value)
	{
		define($key,$value);
	}
}
//新秀
?>