<?php
function module_cat_edit()
{
	global $global,$smarty;
	$list = array();
	$obj = new cat_art();
	$obj->set_where('cat_channel_id = '.$global['channel_id']);
	$arr = $obj->get_list();
	if(count($arr) > 0)
	{
		$list = $obj->set_cat_order($arr);
		for($i = 0; $i < count($list); $i ++)
		{
			$list[$i]['parent_name'] = get_data('cat_art',$list[$i]['cat_parent_id'],'cat_name');
			$obj->set_where('');
			$obj->set_where('cat_parent_id = ' . $list[$i]['cat_id']);
			if($obj->get_count() > 0)
			{
				$list[$i]['exist_child'] = 1;
			}else{
				$list[$i]['exist_child'] = 0;
			}
			$list[$i]['show'] = 1;
		}		
	}
	
	$family = get_cat_family('cat_art',$global['id']);
	for($i = 0; $i < count($family); $i ++)
	{
		for($j = 0; $j < count($list); $j ++)
		{
			if($family[$i] == $list[$j]['cat_id'])
			{
				$list[$j]['show'] = 0;
			}
		}
	}
	$smarty->assign('cat_list',$list);
	
	$obj = new cat_art();
	$obj->set_where('cat_id = '.$global['id']);
	$one = $obj->get_one();
	$smarty->assign('cat',$one);
}
//新秀
?>