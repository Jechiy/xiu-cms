<?php
function module_tailor_cat_add()
{
	global $global,$smarty;
	
	$obj = new channel();
	$channel = $obj->get_list();
	$smarty->assign('channel',$channel);
	
	$cat_list = array();
	$obj = new cat_art();
	$obj->set_where('cat_channel_id = 1');
	$arr = $obj->get_list();
	if(count($arr) > 0)
	{
		$cat_list = $obj->set_cat_order($arr);	
	}
	$smarty->assign('cat_list',$cat_list);
}

//新秀
?>