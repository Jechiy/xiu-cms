<?php
include('smarty/Smarty.class.php');
include('admin/common.func.php');
	
set_smarty();
load_lang_pack(array($global['channel']),'admin');
initial('admin');
unset_session('admin_username');
unset_session('admin_password');
$smarty->assign('info_text','您已经退出系统');
$smarty->assign('link_text','重新登录');
$smarty->assign('link_href',$_SERVER['PHP_SELF']);
$smarty->display('info.php');
	
//新秀
?>