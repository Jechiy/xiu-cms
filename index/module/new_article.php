<?php
function module_new_article()
{
	global $smarty;
	$obj = new article;
	$obj->set_field('art_id,art_channel_id,art_title,art_add_time');
	$obj->set_page_size(10);
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$list[$i]['channel'] = get_data('channel',$list[$i]['art_channel_id'],'cha_code');
		$list[$i]['short_title'] = cut_str($list[$i]['art_title'],16);
	}
	$smarty->assign('new_article',$list);
}

//新秀
?>