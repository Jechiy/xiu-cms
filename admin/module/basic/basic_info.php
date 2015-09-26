<?php
function module_basic_info()
{
	global $smarty;
	$smarty->assign('root_dir',S_ROOT);
	$smarty->assign('now',date('Y-m-d H:i:s'));
	$smarty->assign('user_ip',get_ip());
	$smarty->assign('http_user_agent',$_SERVER['HTTP_USER_AGENT']);
	$smarty->assign('server_name',$_SERVER['SERVER_NAME']);
	$smarty->assign('server_addr',gethostbyname($_SERVER['SERVER_NAME']));
	$smarty->assign('server_port',$_SERVER['SERVER_PORT']);
	$smarty->assign('server_software',$_SERVER['SERVER_SOFTWARE']);
}
//新秀
?>