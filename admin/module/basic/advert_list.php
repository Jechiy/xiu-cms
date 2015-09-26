<?php
function module_advert_list()
{
	global $smarty;
	$obj = new advert();
	$smarty->assign('advert',$obj->get_list());
}
//新秀
?>