<?php
function module_admin_edit()
{
	global $global,$smarty;
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['id']);
	$smarty->assign('admin',$obj->get_one());
}
//新秀
?>