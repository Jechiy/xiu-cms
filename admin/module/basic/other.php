<?php
function module_other()
{
	global $smarty;
	$smarty->assign('S_SESSION',S_SESSION);
	
	$smarty->assign('index_art_list_len',get_varia('index_art_list_len'));
	$smarty->assign('art_list_len',get_varia('art_list_len'));
	
	$smarty->assign('sentmail',intval(get_varia('sentmail')));
	$smarty->assign('sentmail_smtp',get_varia('sentmail_smtp'));
	$smarty->assign('sentmail_send',get_varia('sentmail_send'));
	$smarty->assign('sentmail_password',get_varia('sentmail_password'));
	$smarty->assign('sentmail_receive',get_varia('sentmail_receive'));
}
//新秀
?>