<?php
function module_footer()
{
	global $smarty;
	$obj = new menu();
	$obj->set_where("men_type = 'footer'");
	$smarty->assign('footer_nav',$obj->get_list());
	$obj = new varia();
	$site['domain'] = $obj->get_value('site_domain');
	$site['record'] = $obj->get_value('site_record');
	$site['record_url'] = $obj->get_value('site_record_url');
	$site['tech'] = $obj->get_value('site_tech');
	$site['tech_url'] = $obj->get_value('site_tech_url');
	$site['statistical_code'] = im_filter($obj->get_value('statistical_code',true));
	$smarty->assign('site',$site);
}
//新秀
?>