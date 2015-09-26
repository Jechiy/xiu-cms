<?php
function module_add()
{
	global $global,$smarty;
	$list = array();
	$obj = new cat_art();
	$obj->set_where('cat_channel_id = '.$global['channel_id']);
	$arr = $obj->get_list();
	if(count($arr) > 0)
	{
		$list = $obj->set_cat_order($arr);	
	}
	$smarty->assign('cat_list',$list);
	
	$smarty->assign('editor_text','');
	$smarty->assign('site_keywords',get_varia('site_keywords'));
	$smarty->assign('site_description',get_varia('site_description'));
	$smarty->assign('upl_date',date('Ymd'));
}
//新秀
?>