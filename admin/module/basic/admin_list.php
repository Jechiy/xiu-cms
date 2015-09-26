<?php
function module_admin_list()
{
	global $global,$smarty;
	$obj = new admin();
	$list = $obj->get_list();
	$smarty->assign('admin',$list);
	
	$obj->set_where('adm_id = '.$global['admin_id']);
	$one = $obj->get_one();
	$smarty->assign('me',$one);
}
//新秀
?>