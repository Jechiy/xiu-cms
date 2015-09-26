<?php
function module_sheet()
{
	global $global,$smarty;
	$prefix = $global['channel'].'/mod-sheet';
	if(isset($global['field']))
	{
		$prefix = $prefix.'/field-'.$global['field'];
	}
	if(isset($global['key']))
	{
		$prefix = $prefix.'/key-'.$global['key'];
	}
	$obj = new article();
	$obj->set_where('art_channel_id = '.$global['channel_id']);
	if(isset($global['key']))
	{
		$obj->set_where($global['field']." like '%".url_decode($global['key'])."%'");
	}
	$obj->set_page_size(10);
	$obj->set_page_num($global['page']);
	$sheet = $obj->get_sheet();
	for($i = 0; $i < count($sheet); $i ++)
	{
		$sheet[$i]['cat_name'] = get_data('cat_art',$sheet[$i]['art_cat_id'],'cat_name');
	}
	set_link($obj->get_page_sum());
	$smarty->assign('article',$sheet);
	$smarty->assign('prefix',$prefix);
}
//新秀
?>