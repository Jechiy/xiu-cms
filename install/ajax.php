<?php
include('function.php');
$power = check_power();
$help = "";
if($power == 1)
{
	echo '网站目录写入权限不足，请更改权限后重试！' . $help;
}elseif($power == 2){
	echo '网站目录修改权限不足，请更改权限后重试！' . $help;
}elseif(!function_exists('scandir')){
	echo 'scandir()函数不可用，请修改服务器配置后重试！' . $help;
}else{
	switch(post('db_type'))
	{
		case 'mysql':
			$db_host = post('db_host');
			$db_name = post('db_name');
			$db_user = post('db_user');
			$db_pass = post('db_pass');
			$db_prefix = post('db_prefix');
			
			if($db_host == '' || $db_name == '' || $db_user == '')
			{
				echo '数据库信息不足！' . $help;
			}elseif(@mysql_connect($db_host,$db_user,$db_pass)){
				if(mysql_select_db($db_name))
				{
					if(mysql_query("select * from ".$db_prefix."varia"))
					{
						echo '检测到数据表已存在，如果您之前已经安装过一次，重新安装之前请先清空数据库或更换数据表前缀。' . $help;
					}else{
						echo 1;
					}
				}else{
					echo 1;
				}
			}else{
				echo '连接数据库失败，请检查您所填写的数据库信息是否正确。' . $help;
			}
		break;
		case 'access':
			echo 1;
		break;
		default: echo '未知错误';
	}
}
function check_power()
{
	$test_file = './test.txt';
	if(!@fopen($test_file,'wb'))
	{
		return 1;
	}elseif(!@unlink($test_file)){
		return 2;
	}
	return 9;
}
?>