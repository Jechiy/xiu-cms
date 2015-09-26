<?php
function module_comment_sheet()
{
	global $global,$smarty;
	$obj = new comment();
	$obj->set_page_size(10);
	$obj->set_page_num($global['page']);	
	$sheet = $obj->get_sheet();
	set_link($obj->get_page_sum());
	for($i = 0; $i < count($sheet); $i ++)
	{
		$sheet[$i]['channel'] = '';
		$sheet[$i]['title'] = '';
		$obj = new channel();
		$list = $obj->get_list();
		for($j = 0; $j < count($list); $j ++)
		{
			if($list[$j]['cha_id'] == $sheet[$i]['com_channel_id'])
			{
				$sheet[$i]['channel'] = $list[$j]['cha_code'];
				$original = $list[$j]['cha_code'];
				if($list[$j]['cha_original'] != 0)
				{
					for($k = 0; $k < count($list); $k ++)
					{
						if($list[$j]['cha_original'] == $list[$k]['cha_id'])
						{
							$original = $list[$k]['cha_code'];
						}
					}
				}
				if($original == 'goods'){$table = 'goods';}else{$table = 'article';}
				$sheet[$i]['title'] = get_data($table,$sheet[$i]['com_page_id'],substr($table,0,3).'_title');
			}
		}
	}
	$smarty->assign('comment',$sheet);
}
//新秀
?>