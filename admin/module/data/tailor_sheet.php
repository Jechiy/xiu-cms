<?php
function module_tailor_sheet()
{
	global $global,$smarty;
	
	$obj = new varia();
	$obj->set_where("var_name = 'tailor_data_cat'");
	$list = $obj->get_list();
	if(count($list))
	{
		for($i = 0;$i < count($list);$i ++)
		{
			$arr = explode('|',$list[$i]['var_value']);
			$cat_list[$i]['server_id'] = $arr[0];
			$cat_list[$i]['server_name'] = $arr[1];
		}
	}else{
		$cat_list = array();
	}
	$smarty->assign('cat_list',$cat_list);
	
	$data_username = rawurlencode(get_varia('data_username'));
	$data_password = rawurlencode(get_varia('data_password'));
	
	$cat = get_global('cat');
	$page = get_global('page');
	$prefix = 'data/mod-tailor_sheet';
	
	$page_sum = 1;
	$sheet = array();
	
	if($cat)
	{
		$prefix = $prefix . '/cat-'.$cat;
	}
	$url = S_SERVER_URL . 'tailor.php?/tailor/cat-' . $cat . '/page-' . $page . '/data_username-' . $data_username . '/data_password-' . $data_password . '/index.html';
	
	
	$str = file_get_contents($url);
	$result = json_decode(rawurldecode($str),true);
	if(is_array($result))
	{
		if($result['error'] == 'no')
		{
			$sheet = $result['sheet'];
			for($i = 0;$i < count($sheet);$i ++)
			{
				$obj = new article();
				$obj->set_where("art_title = '" . $sheet[$i]['art_title'] . "'");
				if($obj->get_count())
				{
					$sheet[$i]['is_exist'] = 1;
				}else{
					$sheet[$i]['is_exist'] = 0;
				}
			}
			$page_sum = $result['page_sum'];
		}
	}
	
	$smarty->assign('page_sum',$page_sum);
	$smarty->assign('prefix',$prefix);
	$smarty->assign('article',$sheet);
}
//新秀
?>