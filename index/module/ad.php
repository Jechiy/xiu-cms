<?php
function module_ad($par)
{
	global $smarty;
	$obj = new advert();
	$obj->set_where('adv_id = '.$par['id']);
	$one = $obj->get_one();
	$ad = '';
	if(count($one))
	{
		$ad = str_replace('&#39;',chr(39),$one['adv_code']);
	}
	$smarty->assign('ad',$ad);
}
//新秀
?>