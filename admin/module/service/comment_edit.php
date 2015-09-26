<?php
function module_comment_edit()
{
	global $global,$smarty;
	$obj = new comment();
	$obj->set_where('com_id = '.$global['id']);
	$one = $obj->get_one();
	$one['channel'] = '';
	$one['title'] = '';
	$obj = new channel();
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		if($list[$i]['cha_id'] == $one['com_channel_id'])
		{
			$one['channel'] = $list[$i]['cha_code'];
			$original = $list[$i]['cha_code'];
			if($list[$i]['cha_original'] != 0)
			{
				for($j = 0; $j < count($list); $j ++)
				{
					if($list[$i]['cha_original'] == $list[$j]['cha_id'])
					{
						$original = $list[$j]['cha_code'];
					}
				}
			}
			if($original == 'goods'){$table = 'goods';}else{$table = 'article';}
			$one['title'] = get_data($table,$one['com_page_id'],substr($table,0,3).'_title');
		}
	}
	$smarty->assign('comment',$one);
}
//新秀
?>