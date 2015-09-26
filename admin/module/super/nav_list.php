<?php
function module_nav_list()
{
	global $smarty;
	$obj = new varia();
	$obj->set_where("left(var_name,10) = 'nav_admin_'");
	$arr = $obj->get_list();
	for($i = 0; $i < count($arr); $i ++)
	{
		$name = substr($arr[$i]['var_name'],4);
		$obj = new menu();
		$obj->set_where('');
		$obj->set_where("men_type = '$name'");
		$list[$name] = $obj->get_list();
		$nav[$i]['type'] = $name;
		$nav[$i]['name'] = $arr[$i]['var_value'];
	}
	$smarty->assign('nav',$nav);
	$smarty->assign('list',$list);
}
//新秀
?>