<?php
function module_pic_list()
{
	global $global,$smarty;
	$dir_path = url_decode($global['path']);
	$list = get_file_list($dir_path);
	$smarty->assign('list',$list);
	$smarty->assign('dir_path',$dir_path);
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
	$return = get_id('goods','goo_img',$val);
	if(!$return)
	{
	 $return = get_id('goods','goo_x_img',$val);
	}
	if(!$return)
	{
	 $return = get_id('picture','pic_path',$val);
	}
	return $return;
}
//新秀
?>