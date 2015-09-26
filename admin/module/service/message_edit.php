<?php
function module_message_edit()
{
	global $global,$smarty;
	$obj = new message();
	$obj->set_where('mes_id = '.$global['id']);
	$smarty->assign('message',$obj->get_one());
}
//新秀
?>