<?php
function module_message_sheet()
{
	global $global,$smarty;
	$obj = new message();
	$obj->set_page_size(10);
	$obj->set_page_num($global['page']);
	$sheet = $obj->get_sheet();
	set_link($obj->get_page_sum());
	$smarty->assign('message',$sheet);
}
//新秀
?>