<?php
function edit_contact()
{
	global $smarty,$lang;
	$obj = new varia();
	for($i = 0; $i < count($_POST['id']); $i ++)
	{
		$cue = strict($_POST['cue'][$i]);
		$content = strict($_POST['content'][$i]);
		$id = strict($_POST['id'][$i]);
		$val = $cue.'{v}'.$content;
		$obj->set_value('var_value',$val);
		$obj->set_where('');
		$obj->set_where("var_id = $id");
		$obj->edit();
	}
	$smarty->assign('info_text','修改联系方式成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'contact_list')));
}
function add_contact()
{
	global $smarty,$lang;
	$cue = post('cue');
	$content = post('content');
	$val = $cue.'{v}'.$content;
	$obj = new varia();
	$obj->set_value('var_name','contact');
	$obj->set_value('var_value',$val);
	$obj->set_value('var_lang',S_LANG);
	$obj->add();
	$smarty->assign('info_text','添加联系方式成功');
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'contact_list')));
}
function edit_site()
{
	global $smarty,$lang;
	$site_title = post('site_title');
	$site_name = post('site_name');
	$site_domain = post('site_domain');
	$site_record = post('site_record');
	$site_record_url = post('site_record_url');
	$site_tech = post('site_tech');
	$site_tech_url = post('site_tech_url');
	$site_keywords = post('site_keywords');
	$site_description = cut_str(post('site_description'),250);
	$statistical_code = post('statistical_code','loose');
	$share_code = post('share_code','loose');
	
	$obj = new varia();
	$obj->edit_var_value('site_title',$site_title);
	$obj->edit_var_value('site_name',$site_name);
	$obj->edit_var_value('site_domain',$site_domain);
	$obj->edit_var_value('site_record',$site_record);
	$obj->edit_var_value('site_record_url',$site_record_url);
	$obj->edit_var_value('site_tech',$site_tech);
	$obj->edit_var_value('site_tech_url',$site_tech_url);
	$obj->edit_var_value('site_keywords',$site_keywords);
	$obj->edit_var_value('site_description',$site_description);
	$obj->edit_var_value('statistical_code',$statistical_code,true);
	$obj->edit_var_value('share_code',$share_code,true);
	$smarty->assign('info_text','修改网站设置成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'site_set')));
}
function edit_nav()
{
	global $smarty,$lang;
	for($i = 0; $i < count($_POST['id']); $i ++)
	{
		$word = strict($_POST['word'][$i]);
		$link = strict($_POST['link'][$i]);
		$id = strict($_POST['id'][$i]);
		$obj = new menu();
		$obj->set_value('men_name',$word);
		$obj->set_value('men_url',$link);
		$obj->set_where("men_id = $id");
		$obj->edit();
	}
	$smarty->assign('info_text','修改导航成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'nav_list')));
}
function add_nav()
{
	global $smarty,$lang;
	$type = post('type');
	$word = post('word');
	$link = post('link');
	$obj = new menu();
	$obj->set_value('men_type',$type);
	$obj->set_value('men_name',$word);
	$obj->set_value('men_url',$link);
	$obj->set_value('men_lang',S_LANG);
	$obj->add();
	$smarty->assign('info_text','添加导航成功');
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'nav_list')));
}
function edit_show()
{
	$id = post('id');
	$arr = explode('-',$id);
	$xml_path = S_TPL_PATH.'index/config.xml';
	$xml = new domdocument();
	$xml->load($xml_path);
	$tag = $xml->getelementsbytagname('site')->item(0)->getelementsbytagname('*');
	$len = $tag->length;
	$page_name = '';
	$page_node = '';
	$flag = 0;
	for($i = 0; $i < $len; $i ++)
	{
		$node_name = $tag->item($i)->nodeName;
		$node_text = str_replace('*','',$tag->item($i)->nodeValue);
		if($node_name == $arr[0])
		{
			$flag = 1;
		}elseif($node_name != 'module')
		{
			$flag = 0;
		}
		if($flag == 1 && $node_name == 'module' && $node_text == $arr[1])
		{
			if(intval($arr[2]))
			{
				$tag->item($i)->nodeValue = $node_text;
				edit_tpl_show($arr[0],$arr[1],1);
			}else{
				$tag->item($i)->nodeValue = '*'.$node_text;
				edit_tpl_show($arr[0],$arr[1],0);
			}
		}
	}
	file_put_contents($xml_path,$xml->saveXML());
	echo 1;
}
function edit_tpl_show($page_name,$node_text,$val)
{
	$path = S_TPL_PATH.'index/'.$page_name.'.php';
	$file = file_get_contents($path);
	if($val)
	{
		$regex = '/(\{\*run)[^(\*\})]*(\*\})/';
	}else{
		$regex = '/(\{run)[^(\})]*(\})/';
	}
	$matches = array();
	if(preg_match_all($regex,$file,$matches))
	{
		for($i = 0; $i < count($matches[0]); $i ++)
		{
			$strpos = strpos($matches[0][$i],"module='$node_text'");
			if($strpos)
			{
				$str = $matches[0][$i];
				if($val)
				{
					$str = str_replace('{*','{',$str);
					$str = str_replace('*}','}',$str);
				}else{
					$str = str_replace('{','{*',$str);
					$str = str_replace('}','*}',$str);
				}
				$file = str_replace($matches[0][$i],$str,$file);
				break;
			}
		}
	}
	file_put_contents($path,$file);
}
function set_half_static()
{
	$val = intval(post('val'));
	edit_config('S_HALF_STATIC',S_HALF_STATIC,$val);
	echo 1;
}
function set_sham_static()
{
	$val = intval(post('val'));
	edit_config('S_SHAM_STATIC',S_SHAM_STATIC,$val);
	if($val)
	{
		edit_config('S_URL_PREFIX',S_URL_PREFIX,'');
		copy('admin/module/basic/htaccess.txt','.htaccess');
	}elseif(file_exists('.htaccess')){
		if(S_PURE_STATIC == 1)
		{
			edit_config('S_URL_PREFIX',S_URL_PREFIX,'html/');
		}else{
			edit_config('S_URL_PREFIX',S_URL_PREFIX,'?/');
		}
		unlink('.htaccess');
	}
	echo 1;
}
function set_pure_static()
{
	$val = intval(post('val'));
	edit_config('S_PURE_STATIC',S_PURE_STATIC,$val);
	if($val)
	{
		edit_config('S_URL_PREFIX',S_URL_PREFIX,'html/');
	}else{
		edit_config('S_URL_PREFIX',S_URL_PREFIX,'?/');
	}
	echo 1;
}
function static_check()
{
	if(S_HALF_STATIC == 1)
	{
		echo 1;
	}else{
		echo 0;
	}
}
function create_static()
{
	$val = post('val');
	include('admin/module/basic/create_static_'.$val.'.php');
	do_create_static();
}
function clear_static()
{
	$type = post('type');
	if($type == 'all')
	{
		del_dir('html');
	}elseif($type == 'sheet'){
		del_dir_special('html','id-');
	}else{
		del_dir('html/'.$type);
	}
	echo 1;
}
function del_dir_special($src,$str)
{
	$dir = opendir($src);
	while(false !== ($file = readdir($dir)))
	{
		if(($file != '.') && ($file != '..') && (substr($file,0,strlen($str)) != $str))
		{
			if(is_dir($src.'/'.$file))
			{
				del_dir_special($src.'/'.$file,$str);
			}else{
				unlink($src.'/'.$file);
			}
		}
	}
	closedir($dir);
}
function admin_power()
{
	global $global,$smarty;
	$adm_id = post('adm_id');
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['admin_id']);
	$a = $obj->get_one();
	$obj->set_where('');
	$obj->set_where("adm_id = $adm_id");
	$b = $obj->get_one();
	$success = 0;
	if($a['adm_grade'] < $b['adm_grade'])
	{
		$adm_power = '';
		for($i = 0; $i < count($_POST['url']); $i ++)
		{
			$adm_power .= strict($_POST['url'][$i]) . '|';
		}
		$adm_power = substr($adm_power,0,-1);
		$obj->set_value('adm_power',$adm_power);
		$obj->set_where('');
		$obj->set_where("adm_id = $adm_id");
		$obj->edit();
		$success = 1;
	}
	if($success)
	{
		$info_text = '修改权限成功';
		$link_text = '返回列表页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_list'));
	}else{
		$info_text = '修改权限失败';
		$link_text = '返回上一页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_power'));
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$link_text);
	$smarty->assign('link_href',$link_href);
}
function check_admin_name()
{
	$name = post('name');
	$obj = new admin();
	$obj->set_where("adm_username = '$name'");
	if($obj->get_count())
	{
		echo 1;
	}else{
		echo 0;
	}
}
function add_admin()
{
	global $global,$smarty;
	$adm_username = post('adm_username');
	$adm_password = post('adm_password');
	$re_password = post('re_password');	
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['admin_id']);
	$one = $obj->get_one();
	$adm_grade = $one['adm_grade'] + 1;
	$obj->set_where('');
	$obj->set_where("adm_username = '$adm_username'");
	if($obj->get_count() == 0 && strlen($adm_username) >= 5 && strlen($adm_password) >= 5 && $adm_password == $re_password)
	{
		$obj->set_value('adm_username',$adm_username);
		$obj->set_value('adm_password',md5($adm_password));
		$obj->set_value('adm_grade',$adm_grade);
		$obj->add();
		$info_text = '添加管理员帐号成功';
		$link_text = '返回列表页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_list'));
	}else{
		$info_text = '添加管理员帐号失败';
		$link_text = '返回上一页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_add'));
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$link_text);
	$smarty->assign('link_href',$link_href);
}
function edit_admin()
{
	global $global,$smarty;
	$adm_id = post('adm_id');
	$adm_password = post('adm_password');
	$re_password = post('re_password');	
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['admin_id']);
	$a = $obj->get_one();
	$obj->set_where('');
	$obj->set_where("adm_id = $adm_id");
	$b = $obj->get_one();
	$success = 0;
	if($obj->get_count())
	{
		if($a['adm_id'] == $b['adm_id'] || $a['adm_grade'] < $b['adm_grade'])
		{
			if(strlen($adm_password) >= 5 && $adm_password == $re_password)
			{
				$obj->set_value('adm_password',md5($adm_password));
				$obj->edit();
				$success = 1;
			}
		}
	}
	if($success)
	{
		$info_text = '修改密码成功';
		$link_text = '返回列表页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_list'));
	}else{
		$info_text = '修改密码失败';
		$link_text = '返回上一页';
		$link_href = url(array('channel'=>'basic','mod'=>'admin_edit'));
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$link_text);
	$smarty->assign('link_href',$link_href);
}
function del_admin()
{
	global $global;
	$adm_id = post('id');
	$obj = new admin();
	$obj->set_where('adm_id = '.$global['admin_id']);
	$a = $obj->get_one();
	$obj->set_where('');
	$obj->set_where("adm_id = $adm_id");
	$b = $obj->get_one();
	if($obj->get_count())
	{
		if($a['adm_grade'] < $b['adm_grade'])
		{
			$obj->del();
			set_cookie('result',1);
		}
	}
	echo 1;
}
function db_backup()
{
	global $smarty,$lang;
	if(file_exists(S_DB_PATH.S_DB_NAME))
	{
		$file = '#'.date('Ymdhis').'.php';
		if(copy(S_DB_PATH.S_DB_NAME,S_DB_PATH.'backup/'.$file))
		{
			$info_text = '备份数据库成功';
		}else{
			$info_text = '备份数据库失败';
		}
	}else{
		$info_text = 'ACCESS数据库不存在';
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'db_set')));	
}
function db_restore()
{
	$file = post('file');
	if(substr($file,-4) == '.php')
	{
		if(file_exists(S_DB_PATH.S_DB_NAME))
		{
			if(copy(S_DB_PATH.'backup/'.$file,S_DB_PATH.S_DB_NAME))
			{
				$result = 1;
			}
		}
	}
	echo isset($result)?$result:0;
}
function set_multilingual()
{
	$val = intval(post('val'));
	edit_config('S_MULTILINGUAL',S_MULTILINGUAL,$val);
	$obj = new varia();
	$obj->set_where("var_name = 'languages'");
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i ++)
	{
		$arr = explode('{v}',$list[$i]['var_value']);
		$pack_name = $arr[0];
		$index_entrance = $arr[1];
		$admin_entrance = $arr[2];
		if($pack_name == 'zh-cn')
		{
			continue;
		}elseif($val == 1){
			if(!file_exists($index_entrance))
			{
				$file = file_get_contents('admin/index.txt');
				$file = str_replace('{$pack_name}',$pack_name,$file);
				$file = str_replace('{$index_entrance}',$index_entrance,$file);
				$file = str_replace('{$admin_entrance}',$admin_entrance,$file);
				file_put_contents($index_entrance,$file);
			}
			if(!file_exists($admin_entrance))
			{
				$file = file_get_contents('admin/admin.txt');
				$file = str_replace('{$pack_name}',$pack_name,$file);
				$file = str_replace('{$index_entrance}',$index_entrance,$file);
				$file = str_replace('{$admin_entrance}',$admin_entrance,$file);
				file_put_contents($admin_entrance,$file);
			}
		}elseif($val == 0){
			if(file_exists($index_entrance)) unlink($index_entrance);
			if(file_exists($admin_entrance)) unlink($admin_entrance);
		}
	}
	echo 1;
}
function set_session_method()
{
	$val = intval(post('val'));
	edit_config('S_SESSION',S_SESSION,$val);
	echo 1;
}
function clear_cache()
{
	$dir = 'admin/compile';
	$list = scandir($dir);
	foreach($list as $file)
	{
		if($file != '.' && $file != '..' && !is_dir($dir.'/'.$file))
		{
			unlink($dir.'/'.$file);
		}
	}
	$dir = 'index/compile';
	$list = scandir($dir);
	foreach($list as $file)
	{
		if($file != '.' && $file != '..' && !is_dir($dir.'/'.$file))
		{
			unlink($dir.'/'.$file);
		}
	}
	echo 1;
}
function save_sentmail()
{
	global $smarty,$lang;
	$smtp = post('smtp');
	$send = post('send');
	$password = post('password');
	$receive = post('receive');
	$obj = new varia();
	$obj->edit_var_value('sentmail_smtp',$smtp);
	$obj->edit_var_value('sentmail_send',$send);
	$obj->edit_var_value('sentmail_password',$password);
	$obj->edit_var_value('sentmail_receive',$receive);
	
	$smarty->assign('info_text','修改邮件通知设置成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'other')));
}
function add_or_edit_advert()
{
	global $smarty,$lang;
	$adv_id = post('adv_id');
	$adv_name = post('adv_name');
	$adv_code = post('adv_code','loose');

	$obj = new advert();
	$obj->set_value('adv_name',$adv_name);
	$obj->set_value('adv_code',$adv_code);
	if($adv_id != '')
	{
		$obj->set_where("adv_id = $adv_id");
		$obj->edit();
		$info_text = '修改广告成功';
	}else{
		$obj->add();
		$info_text = '添加广告成功';
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'basic','mod'=>'advert_list')));
}
//新秀
?>