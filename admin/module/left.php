<?php
function module_left()
{
	global $global,$smarty;
	if($global['channel'] == 'about' || $global['channel'] == 'recruit' || $global['channel'] == 'download')
	{
		$type = 'article';
	}else{
		$type = $global['channel'];
	}
	
	$obj = new menu();
	$obj->set_field('men_name,men_url');
	$obj->set_where('');
	$obj->set_where("men_lang = 'none'");
	$obj->set_where("men_type = 'admin_".$type."'");
	$obj->set_where("men_show = 1");
	$smarty->assign('nav_left',$obj->get_list());
}
//新秀
?>