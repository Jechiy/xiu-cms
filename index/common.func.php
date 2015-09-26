<?php
function set_smarty()
{
	global $smarty;
	$smarty = new Smarty;
	if(S_BROWSER == 'pc' || S_BROWSER == 'unknown')
	{
		$smarty->template_dir = S_TPL_PATH.'index/';
	}else{
		$smarty->template_dir = S_TPL_PATH.'mobile/';
	}
	$smarty->compile_dir = 'index/compile/';
	$smarty->cache_dir = 'index/cache/';
}
function initial($table)
{
	global $global,$smarty,$lang;
	$tab = substr($table,0,3);
	if(check_copr() && !$global['id'])
	{
		$page_title = '';
		$cat_name = '';
		$keywords = get_varia('site_keywords');
		$describe = get_varia('site_description');
	}else{
		$global['cat'] = get_data($table,$global['id'],$tab.'_cat_id');
		if(!($page_title = get_data($table,$global['id'],$tab.'_title')))
		{
			$page_title = get_data($table,$global['id'],$tab.'_name');
		}
		$cat_name = get_data('cat_'.$tab,$global['cat'],'cat_name');
		$keywords = get_data($table,$global['id'],$tab.'_keywords');
		$describe = get_data($table,$global['id'],$tab.'_description');
	}
	if($global['cat']){$cat_name = get_data('cat_'.$tab,$global['cat'],'cat_name');}
	
	$global['entrance'] = get_lang_info(S_LANG,2);
	$global['entrance'] = $global['entrance'] == 'index.php' ? '' : $global['entrance'];
	
	$smarty->assign('global',$global);
	$smarty->assign('lang',$lang);
	$smarty->assign('version',get_varia('version'));
	$smarty->assign('site_title',get_varia('site_title'));
	$smarty->assign('channel_title',get_channel_title());
	$smarty->assign('page_title',$page_title);
	$smarty->assign('cat_name',$cat_name);
	$smarty->assign('keywords',$keywords);
	$smarty->assign('describe',$describe);
		
	$smarty->assign('S_ROOT',S_ROOT);
	$smarty->assign('S_TPL_PATH',S_ROOT . S_TPL_PATH);
	$smarty->assign('S_LANG',S_LANG);
	$smarty->assign('S_MULTILINGUAL',S_MULTILINGUAL);
	
	$smarty->registerPlugin('function','run','run');
	$smarty->registerPlugin('function','url','url');
}
function check_copr()
{
	$flag = true;
	$path = S_TPL_PATH . 'index/module/';
	$path .= 'copy' . 'right' . '.php';
	if(file_exists($path))
	{
		if(substr(md5_file($path),0,8) != '96932e73'){$flag = false;}
	}
	if(!$flag){echo 'si'.'ns'.'iu';exit();}
	return $flag;
}
function get_channel_title()
{
	global $global,$lang;
	$return = '';
	if($global['url'] != '')
	{
		$arr = explode('/',$global['url']);
		$str = $arr[1];
		$obj = new channel();
		$obj->set_where("cha_code = '$str'");
		$one = $obj->get_one();
		if(count($one))
		{
			$return = $one['cha_name'];
		}elseif(isset($lang['channel_'.$str])){
			$return = $lang['channel_'.$str];
		}
	}
	return $return;
}
function run($parameter)
{
	global $smarty;
	$path = '';
	$display = '';
	extract($parameter);
	$func = 'module_'.$module;
	include_once('index/module/'.$path.$module.'.php');
	$func($parameter);
	if($display != 'no')
	{
		$smarty->display('module/'.$path.$module.'.php');
	}
}
function url($arr)
{
	extract($arr);
	$str = S_ROOT;
	if(isset($entrance))
	{
		$str .= $entrance . '?/';
		unset($arr['entrance']);
	}else{
		$str .= S_URL_PREFIX;
	}
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
function create_html($url)
{
	if(S_HALF_STATIC)
	{
		$html = ob_get_contents();
		if($url == '')
		{
			if(S_FLASH != 1)
			{
				$path = '/' . S_URL_SUFFIX;
			}else{
				$path = '/flash.html';
			}
		}else{
			$path = $url;
		}
		$path = 'html' . $path;
		if(substr($path,-1) == '/')
		{
			$path .= S_URL_SUFFIX;
		}
		if(!file_exists($path))
		{
			$dir = dirname($path);
			if(!is_dir($dir))
			{
				mkdir($dir,0777,true);
			}
			file_put_contents($path,$html);
		}
	}
}
function get_lang_info($name,$num)
{
	$len = strlen($name);
	$obj = new varia();
	$obj->set_where("var_name = 'languages'");
	$obj->set_where("left(var_value,$len) = '$name'");
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		$arr = explode('{v}',$one['var_value']);
		return $arr[$num - 1];
	}else{
		return '';
	}
}
//新秀
?>