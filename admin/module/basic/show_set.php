<?php
function module_show_set()
{
	global $smarty;
	$xml = new domdocument();
	$xml->load(S_TPL_PATH.'index/config.xml');
	$arr = array();
	$tag = $xml->getelementsbytagname('site')->item(0)->getelementsbytagname('*');
	$len = $tag->length;
	$page_name = '';
	$page_node = '';
	for($i = 0; $i < $len; $i ++)
	{
		$node_name = $tag->item($i)->nodeName;
		$attribute = $tag->item($i)->getattribute('name');
		$node_text = $tag->item($i)->nodeValue;
		if($node_name == 'module' && $attribute != '')
		{
			if(substr($node_text,0,1) != '*')
			{
				$checked_1 = 'checked';
				$checked_0 = '';
			}else{
				$checked_1 = '';
				$checked_0 = 'checked';
				$node_text = str_replace('*','',$node_text);
			}
			$arr[$i]['name'] = $page_name.$attribute;
			$arr[$i]['text'] = $page_node.'-'.$node_text;
			$arr[$i]['yes'] = $checked_1;
			$arr[$i]['no'] = $checked_0;
		}else{
			$page_name = $attribute;
			$page_node = $node_name;
		}
	}
	$smarty->assign('show',$arr);
}
//新秀
?>