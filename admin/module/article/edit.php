<?php
function module_edit()
{
	global $global,$smarty;
	$obj = new article();
	$obj->set_where('art_id = '.$global['id']);
	$one = $obj->get_one();
	$smarty->assign('article',$one);
	$smarty->assign('editor_text',$one['art_text']);
	
	$list = array();
	$obj = new cat_art();
	$obj->set_where('cat_channel_id = '.$global['channel_id']);
	$arr = $obj->get_list();
	if(count($arr) > 0)
	{
		$list = $obj->set_cat_order($arr);	
	}
	$smarty->assign('cat_list',$list);
	$smarty->assign('upl_date',date('Ymd'));
	
}
//新秀
?>