<?php
function module_channel_name()
{
	global $smarty;
	$obj = new channel();
	$smarty->assign('channel',$obj->get_list());
}
//新秀
?>