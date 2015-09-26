<?php
function module_lang_lists()
{
	global $smarty;
	$obj = new varia();
	$obj->set_where("var_name = 'languages'");
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$arr = explode('{v}',$list[$i]['var_value']);
		$list[$i]['pack_name'] = $arr[0];
		$list[$i]['index_entrance'] = $arr[1];
		$list[$i]['admin_entrance'] = $arr[2];
		$list[$i]['chinese_name'] = $arr[3];
		$list[$i]['foreign_name'] = $arr[4];
	}
	$smarty->assign('lang_list',$list);
	$smarty->assign('S_LANG',S_LANG);
	$smarty->assign('pack',get_folder_list('languages'));
}
function get_folder_list($val)
{
	$arr = array();
	$i = 0;
	$list = scandir($val);
	foreach($list as $file)
	{
		if($file != '.' && $file != '..' && is_dir($val.'/'.$file))
		{
			$arr[$i]['name'] = $file;
			$i ++;
		}
	}
	return $arr;
}
//新秀
?>