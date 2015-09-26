<?php
function module_search_main()
{
	global $global,$smarty;
	$global['key'] = url_decode($global['key']);
	$list_len = get_varia('art_list_len');
	$obj = new article();
	$obj->set_field('art_id,art_channel_id,art_title,art_add_time');
	$obj->set_where("art_title like '%" . $global['key'] . "%'");
	$obj->set_page_size($list_len ? $list_len : 20);
	$obj->set_page_num($global['page']);
	$sheet = $obj->get_sheet();
	for($i = 0; $i < count($sheet); $i ++)
	{
		$sheet[$i]['channel'] = get_data('channel',$sheet[$i]['art_channel_id'],'cha_code');
		$sheet[$i]['short_title'] = cut_str($sheet[$i]['art_title'],42);
	}
	set_link($obj->get_page_sum());
	$smarty->assign('search',$sheet);
}
//新秀
?>