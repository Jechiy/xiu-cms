<?php
function module_files_list()
{
	global $smarty;
	$list = get_file_list('resource');
	$smarty->assign('list',$list);
	$smarty->assign('host',$_SERVER['HTTP_HOST']);
}
function get_file_list($val)
{
	$arr = array();
	$i = 0;
	$list = scandir($val);
	foreach($list as $file)
	{
		if($file != '.' && $file != '..' && !is_dir($val.'/'.$file))
		{
			$arr[$i]['id'] = sel_file($val.'/'.$file);
			$arr[$i]['name'] = $file;
			$i ++;
		}
	}
	return $arr;
}
function sel_file($val)
{
	return 0;
}
//新秀
?>