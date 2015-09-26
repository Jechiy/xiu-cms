<?php
function module_tailor_set()
{
	global $global,$smarty;
	
	$obj = new channel();
	$channel = $obj->get_list();
	$smarty->assign('channel',$channel);
	
	$obj = new varia();
	$obj->set_where("var_name = 'tailor_data_cat'");
	$list = $obj->get_list();
	if(count($list))
	{
		for($i = 0;$i < count($list);$i ++)
		{
			$arr = explode('|',$list[$i]['var_value']);
			$cat_setting[$i]['varia_id'] = $list[$i]['var_id'];
			$cat_setting[$i]['server_id'] = $arr[0];
			$cat_setting[$i]['server_name'] = $arr[1];
			$cat_setting[$i]['channel_id'] = $arr[2];
			$cat_setting[$i]['cat_id'] = $arr[3];
		}
	}else{
		$cat_setting = array();
	}
	$smarty->assign('cat_setting',$cat_setting);
	
	$cat_list = array();
	for($i = 0;$i < count($cat_setting);$i ++)
	{
		$obj = new cat_art();
		$obj->set_where('cat_channel_id = ' . $cat_setting[$i]['channel_id']);
		$arr = $obj->get_list();
		if(count($arr) > 0)
		{
			$cat_list[$cat_setting[$i]['server_id']] = $obj->set_cat_order($arr);	
		}
	}
	$smarty->assign('cat_list',$cat_list);
}

//新秀
?>