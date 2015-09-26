<?php
function module_comment()
{
	global $global,$smarty;
	if($global['id'])
	{
		$obj = new comment();
		$obj->set_where('com_channel_id = '.get_id('channel','cha_code',$global['channel']));
		$obj->set_where('com_page_id = '.$global['id']);
		$obj->set_page_size(5);
		$obj->set_page_num($global['page']);
		$sheet = $obj->get_sheet();
		set_link($obj->get_page_sum());
		$smarty->assign('comment',$sheet);
	}
}
//新秀
?>