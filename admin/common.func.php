<?php
function set_smarty()
{
	global $smarty;
	$smarty = new Smarty;
	$smarty->template_dir = S_TPL_PATH.'admin/';
	$smarty->compile_dir = 'admin/compile/';
	$smarty->cache_dir = 'admin/cache/';
}
function initial($table)
{
	global $global,$smarty,$lang;
	
	$smarty->assign('global',$global);
	$smarty->assign('lang',$lang);
	$smarty->assign('version',get_varia('version'));
	$smarty->assign('sit'.'e_ti'.'tle',get_dec_str());
	
	$smarty->assign('S_ROOT',S_ROOT);
	$smarty->assign('S_TPL_PATH',S_ROOT . S_TPL_PATH);
	$smarty->assign('S_LANG',S_LANG);
	$smarty->assign('S_MULTILINGUAL',S_MULTILINGUAL);
	
	$smarty->registerPlugin('function','run','run');
	$smarty->registerPlugin('function','url','url');
}
function run($parameter)
{
	global $smarty;
	$path = '';
	$display = '';
	extract($parameter);
	$func = 'module_'.$module;
	include('admin/module/'.$path.$module.'.php');
	$func($parameter);
	if($display != 'no')
	{
		$smarty->display('module/'.$path.$module.'.php');
	}
}
function url($arr)
{
	extract($arr);
	$str = '?/';
	if(isset($channel) || isset($prefix))
	{
		$str .= (isset($channel)?$channel:$prefix) . '/';
		unset($arr['channel']);
		unset($arr['prefix']);
		foreach($arr as $key => $value)
		{
			$str .= $key . '-' . $value . '/';
		}
	}
	$str .= S_URL_SUFFIX;
	return $str;
}
function set_link($page_sum)
{
	global $global,$smarty;
	$global['page'] = num_bound(1,$page_sum,$global['page']);
	$smarty->assign('page_sum',$page_sum);
}
function check_power()
{
	global $global;
	$flag = 0;
	if($global['admin_id'])
	{
		$obj = new admin();
		$obj->set_where('adm_id = '.$global['admin_id']);
		$one = $obj->get_one();
		if($one['adm_power'] == 'all')
		{
			$flag = 1;
		}elseif($one['adm_power'] != ''){
			$val = $global['channel'].'/mod-'.$global['mod'];
			$urls = explode('|',$one['adm_power']);
			for($i = 0; $i < count($urls); $i ++)
			{
				if($urls[$i] == '/'.$val.'/')
				{
					$flag = 1;
					break;
				}
			}
			if($flag == 0)
			{
				$obj = new menu();
				$obj->set_where('');
				$obj->set_where("men_url like '%".$val."%'");
				if($obj->get_count() == 0)
				{
					$flag = 1;
				}
			}
		}
	}
	return $flag;
}
function edit_config($n,$c,$v)
{
	$file = file_get_contents('include/config.php');
	if(!is_numeric($c))
	{
		$file = str_replace("\$config['$n'] = '$c';","\$config['$n'] = '$v';",$file);
	}else{
		$file = str_replace("\$config['$n'] = $c;","\$config['$n'] = $v;",$file);
	}
	file_put_contents('include/config.php',$file);
}
function get_dec_str()
{
	$str = '%e6%96%b0%e7%a7%80%e6%96';
	$str .= '%87%e7%ab%a0%e7%ae%a1%e7';
	$str .= '%90%86%e7%b3%bb%e7%bb%9f';
	$str .= '%e5%90%8e%e5%8f%b0';
	$str = url_decode($str);
	return $str;
}
function get_site_info()
{
	$site = array();
	$obj = new varia();
	$obj->set_where("(left(var_name,5) = 'site_' or var_name = 'statistical_code' or var_name = 'share_code')");
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$val = $list[$i]['var_value'];
		switch($list[$i]['var_name'])
		{
			case 'site_title': $site['title'] = $val; break;
			case 'site_admin_title': $site['admin_title'] = $val; break;
			case 'site_name': $site['name'] = $val; break;
			case 'site_domain': $site['domain'] = $val; break;
			case 'site_record': $site['record'] = $val; break;
			case 'site_record_url': $site['record_url'] = $val; break;
			case 'site_tech': $site['tech'] = $val; break;
			case 'site_tech_url': $site['tech_url'] = $val; break;
			case 'site_keywords': $site['keywords'] = $val; break;
			case 'site_description': $site['description'] = $val; break;
			case 'statistical_code': $site['statistical_code'] = im_filter($list[$i]['var_text']); break;
			case 'share_code': $site['share_code'] = im_filter($list[$i]['var_text']); break;
		}
	}
	return $site;
}
//新秀
?>