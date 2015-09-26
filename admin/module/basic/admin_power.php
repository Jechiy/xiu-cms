<?php
function module_admin_power()
{
	global $global,$smarty;
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['id']);
	$one = $obj->get_one();
	$power = get_power_arr();
	if($one['adm_power'] == 'all')
	{
		for($i = 0; $i < count($power); $i ++)
		{
			$power[$i]['set'] = 1;
		}
	}elseif($one['adm_power'] != ''){
		$urls = explode('|',$one['adm_power']);
	}else{
		$urls = array();
	}
	if($one['adm_power'] != 'all')
	{
		for($i = 0; $i < count($power); $i ++)
		{
			for($j = 0; $j < count($urls); $j ++)
			{
				if($power[$i]['url'] == $urls[$j])
				{
					$power[$i]['set'] = 1;
					break;
				}else{
					$power[$i]['set'] = 0;
				}
			}
		}
	}
	$smarty->assign('admin',$one);
	$smarty->assign('power',$power);
}
function get_power_arr()
{
	$arr = array();
	$obj = new menu();
	$obj->set_where('');
	$obj->set_where("left(men_type,6) = 'admin_'");
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$arr[$i]['name'] = $list[$i]['men_name'];
		$arr[$i]['url'] = '/' . $list[$i]['men_url'];
		$arr[$i]['set'] = 0;
	}
	return $arr;
}
//新秀
?>