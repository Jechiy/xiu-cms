<?php
function module_link_edit()
{
	global $global,$smarty;
	$obj = new link();
	$obj->set_where('lin_id = '.$global['id']);
	$smarty->assign('link',$obj->get_one());
}
//新秀
?>