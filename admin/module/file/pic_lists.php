<?php
function module_pic_lists()
{
	global $smarty;
	$list_public = get_file_list('images');
	$smarty->assign('list_public',$list_public);
	$list_editor = get_folder_list('images/editor');
	$smarty->assign('list_editor',$list_editor);
	
	$k = 0;
	$lists = array();
	$obj = new channel();
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$arr = get_folder_list('images/'.$list[$i]['cha_code']);
		if(count($arr))
		{
			$k ++;
			$lists[$k]['channel'] = $list[$i]['cha_code'];
			$lists[$k]['name'] = $list[$i]['cha_name'];
			$lists[$k]['folder'] = $arr;
		}
	}
	$smarty->assign('lists',$lists);
	
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
function get_folder_list($val)
{
	$arr = array();
	$i = 0;
	if(file_exists($val))
	{
		$list = scandir($val);
		foreach($list as $file)
		{
			if($file != '.' && $file != '..' && is_dir($val.'/'.$file))
			{
				$arr[$i]['name'] = $file;
				$arr[$i]['path_str'] = rawurlencode($val.'/'.$file);
				$i ++;
			}
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