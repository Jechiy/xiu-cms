<?php
function module_safe_set()
{
	global $smarty;
	$smarty->assign('safe_admin_login_hours',get_varia('safe_admin_login_hours'));
	$smarty->assign('safe_admin_login_times',get_varia('safe_admin_login_times'));
	
	$smarty->assign('safe_message_hours',get_varia('safe_message_hours'));
	$smarty->assign('safe_message_times',get_varia('safe_message_times'));
	$smarty->assign('safe_comment_hours',get_varia('safe_comment_hours'));
	$smarty->assign('safe_comment_times',get_varia('safe_comment_times'));
}
	
//新秀
?>