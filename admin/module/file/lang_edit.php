<?php
function module_lang_edit()
{
	global $global,$smarty;
	$file_path = url_decode($global['path']);
	$lang_text = file_get_contents($file_path);
	$smarty->assign('lang_text',$lang_text);
	$smarty->assign('file_path',$file_path);
}
//新秀
?>