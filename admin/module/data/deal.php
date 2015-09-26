<?php
function edit_data_user()
{
	global $smarty;
	$data_username = post('data_username');
	$data_password = post('data_password');
	
	$obj = new varia();
	$obj->edit_var_value('data_username',$data_username);
	$obj->edit_var_value('data_password',$data_password);
	
	$smarty->assign('info_text','修改采集帐号信息成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'data','mod'=>'set')));
}
function edit_data_cat()
{
	global $smarty;
	
	$obj = new varia();
	$obj->set_where("var_name = 'data_cat'");
	$list = $obj->get_list();
	
	for($i = 0; $i < count($_POST['varia_id']); $i ++)
	{
		$varia_id = strict($_POST['varia_id'][$i]);
		$data_channel = strict($_POST['data_channel'][$i]);
		$data_cat = strict($_POST['data_cat'][$i]);
		for($j = 0; $j < count($list); $j ++)
		{
			if($list[$j]['var_id'] == $varia_id)
			{
				$arr = explode('|',$list[$j]['var_value']);
				if($arr[2] != $data_channel || $arr[3] != $data_cat)
				{
					$val = $arr[0] . '|' . $arr[1] . '|' . $data_channel . '|' . $data_cat;
					$obj = new varia();
					$obj->set_value('var_value',$val);
					$obj->set_where('var_id = ' . $varia_id);
					$obj->edit();
				}
				break;
			}
		}
	}
	
	$smarty->assign('info_text','修改分类设置成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'data','mod'=>'set')));
}
function add_tailor_cat()
{
	global $smarty;
	
	$server_id = post('server_id');
	$server_name = post('server_name');
	$data_channel = post('data_channel');
	$data_cat = post('data_cat');
	
	if(is_numeric($server_id) && is_numeric($data_channel) && is_numeric($data_cat))
	{
		$val = $server_id . '|' . $server_name . '|' . $data_channel . '|' . $data_cat;
		$obj = new varia();
		$obj->set_value('var_name','tailor_data_cat');
		$obj->set_value('var_value',$val);
		$obj->add();
		
		$info_text = '修改分类设置成功';
	}else{
		$info_text = '对不起，您所提交的数据有误';
	}
	
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text','返回列表页');
	$smarty->assign('link_href',url(array('channel'=>'data','mod'=>'tailor_set')));
}
function edit_tailor_cat()
{
	global $smarty;
	
	$obj = new varia();
	$obj->set_where("var_name = 'tailor_data_cat'");
	$list = $obj->get_list();
	
	for($i = 0; $i < count($_POST['varia_id']); $i ++)
	{
		$varia_id = strict($_POST['varia_id'][$i]);
		$data_channel = strict($_POST['data_channel'][$i]);
		$data_cat = strict($_POST['data_cat'][$i]);
		for($j = 0; $j < count($list); $j ++)
		{
			if($list[$j]['var_id'] == $varia_id)
			{
				$arr = explode('|',$list[$j]['var_value']);
				if($arr[2] != $data_channel || $arr[3] != $data_cat)
				{
					$val = $arr[0] . '|' . $arr[1] . '|' . $data_channel . '|' . $data_cat;
					$obj = new varia();
					$obj->set_value('var_value',$val);
					$obj->set_where('var_id = ' . $varia_id);
					$obj->edit();
				}
				break;
			}
		}
	}
	
	$smarty->assign('info_text','修改分类设置成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'data','mod'=>'tailor_set')));
}
//新秀
?>