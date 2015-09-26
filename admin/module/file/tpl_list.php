<?php
function module_tpl_list()
{
	global $smarty;
	$tpl = get_tpl_sheet();
	$smarty->assign('tpl',$tpl);
}
function get_tpl_sheet()
{
	$arr = array();
	$i = 0;
	$list = scandir('templates');
	foreach($list as $file)
	{
		if($file != '.' && $file != '..')
		{
			$arr[$i]['name'] = $file;
			$arr[$i]['text'] = file_get_contents('templates/'.$arr[$i]['name'].'/readme.txt');
			$i ++;
		}
	}
	return $arr;
}
//新秀
?>