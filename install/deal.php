<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="pragma" content="no-cache" />
	<title>sinsiu cms 1.0 beta8 安装</title>
</head>
<body>
<?php
include('function.php');
	
date_default_timezone_set('PRC');
	
$db_type = post('db_type');
$db_prefix = post('db_prefix');
$admin_name = post('admin_name');
$admin_pwd = post('admin_pwd');
$re_pwd = post('re_pwd');
$email = post('email');
$insert_en = post('insert_en');
	
if($db_type == ''){echo '没有选择数据库';exit();}
if($admin_name == ''){echo '后台帐号不能为空';exit();}
if($admin_pwd == ''){echo '后台密码不能为空';exit();}
if($admin_pwd != $re_pwd){echo '两次输入密码不一致';exit();}
if($email == ''){$email = '627780354@qq.com';}
	
//创建数据库
include('create_db.php');
//添加默认数据
include('default_data.php');
include('insert_zh.php');
if(file_exists('insert_test.php'))
{
	include('insert_test.php');
}
//创建配置文件
include('create_config.php');
//替换首页
copy('site_index.php','../index.php');
	
?>
安装成功，为了避免留下安全隐患，<a href="del.php">请点击这里删除安装文件</a>
</body>
</html>