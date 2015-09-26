<?php
function post($val)
{
	return isset($_POST[$val])?$_POST[$val]:'';
}
function sql_query($sql)
{
	global $db_type,$conn;
	$flag = 1;
	switch($db_type)
	{
		case 'mysql':if(!mysql_query($sql)){$flag = 0;}break;
		case 'access':if(!$conn->execute($sql)){$flag = 0;}break;
	}
	if(!$flag)
	{
		echo '执行该语句时出错：<br />';
		echo $sql.'<br />';
		echo '安装前请先清空数据库，避免重复创建数据表<br />';
		exit();	
	}
}
//新秀
?>