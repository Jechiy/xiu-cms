<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="pragma" content="no-cache" />
	<title>sinsiu cms 1.0 beta8 安装</title>
</head>
<body>
<?php
$list = scandir('./');
foreach($list as $file)
{
	if($file != '.' && $file != '..')
	{
		unlink($file);
	}
}
?>
删除文件成功，建议手动删除install文件夹
</body>
</html>