<?php
function module_nav_add()
{
	global $global,$smarty;
	$obj = new varia();
	$obj->set_where("left(var_name,10) = 'nav_stage_'");
	$arr = $obj->get_list();
	for($i = 0; $i < count($arr); $i ++)
	{
		if(substr($arr[$i]['var_name'],10) == $global['type'])
		{
			$type_name = $arr[$i]['var_value'];
		}
	}
	$smarty->assign('type_name',$type_name);
}
//新秀
?>