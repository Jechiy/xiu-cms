<?php
function module_site_set()
{
	global $smarty;
	$smarty->assign('site',get_site_info());
}
//新秀
?>