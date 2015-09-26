<?php
function module_link_list()
{
	global $smarty;
	$obj = new link();
	$smarty->assign('link',$obj->get_list());
}
//新秀
?>