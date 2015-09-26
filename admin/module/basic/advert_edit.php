<?php
function module_advert_edit()
{
	global $global,$smarty;
	$obj = new advert();
	$obj->set_where('adv_id = '.$global['id']);
	$smarty->assign('advert',$obj->get_one());
}
//新秀
?>