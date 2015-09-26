<?php
function module_static_set()
{
	global $smarty;
	$smarty->assign('S_HALF_STATIC',S_HALF_STATIC);
	$smarty->assign('S_SHAM_STATIC',S_SHAM_STATIC);
	$smarty->assign('S_PURE_STATIC',S_PURE_STATIC);
	
	$smarty->assign('single_page_static',get_varia('single_page_static'));
}
//新秀
?>