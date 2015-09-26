<?php
function module_channel_add()
{
	global $smarty;
	$obj = new channel();
	$obj->set_where("cha_original = 0");
	$smarty->assign('original',$obj->get_list());
	
	$arr = array();
	$obj = new channel();
	$obj->set_where("cha_original <> 0");
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$list[$i]['original'] = get_data('channel',$list[$i]['cha_original'],'cha_code');
	}
	$smarty->assign('channel',$list);
}
//新秀
?>