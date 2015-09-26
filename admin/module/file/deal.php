<?php
function select_tpl()
{
	$tpl = post('tpl');
	$n = 'S_TPL_PATH';
	$c = S_TPL_PATH;
	$v = 'templates/'.$tpl.'/';
	edit_config($n,$c,$v);
	echo 1;
}
function add_lang()
{
	global $smarty,$lang;
	$chinese_name = post('chinese_name');
	$foreign_name = post('foreign_name');
	$pack_name = post('pack_name');
	$short_name = post('short_name');
	$index_entrance = post('index_entrance');
	$admin_entrance = post('admin_entrance');
	if($chinese_name != '' && $foreign_name != '' && $pack_name != '' && $index_entrance != '' && $admin_entrance != '' && $index_entrance != 'index.php' && $admin_entrance != 'admin.php')
	{
		$var_value = $pack_name .'{v}'. $index_entrance .'{v}'. $admin_entrance .'{v}'. $chinese_name .'{v}'. $foreign_name;
		
		$obj = new varia();
		$obj->add_var_value('languages',$var_value);
		
		$site = get_site_info();
		$obj->add_var_value('site_title',$site['title'],$pack_name);
		$obj->add_var_value('site_name',$site['name'],$pack_name);
		$obj->add_var_value('site_record',$site['record'],$pack_name);
		$obj->add_var_value('site_tech',$site['tech'],$pack_name);
		$obj->add_var_value('site_keywords',$site['keywords'],$pack_name);
		$obj->add_var_value('site_description',$site['description'],$pack_name);
		
		$obj->add_var_value('notice','',$pack_name,true);
		$obj->add_var_value('service_code','',$pack_name,true);
		$obj->add_var_value('user_agreement','',$pack_name,true);
		
		$obj = new channel();
		$obj->set_where('cha_original = 0');
		$list = $obj->get_list();
		for($i = 0; $i < count($list); $i ++)
		{
			$obj->clear_value();
			$obj->set_value('cha_lang',$pack_name);
			$obj->set_value('cha_code',$list[$i]['cha_code']);
			$obj->set_value('cha_name',$list[$i]['cha_name']);
			$obj->set_value('cha_original',$list[$i]['cha_original']);
			$obj->add();
		}
		
		if(!file_exists('languages/'.$pack_name))
		{
			copy_dir('languages/'.S_LANG,'languages/'.$pack_name);
		}
		
		if(S_MULTILINGUAL)
		{
			$file = file_get_contents('admin/index.txt');
			$file = str_replace('{$pack_name}',$pack_name,$file);
			$file = str_replace('{$index_entrance}',$index_entrance,$file);
			$file = str_replace('{$admin_entrance}',$admin_entrance,$file);
			file_put_contents($index_entrance,$file);
			
			$file = file_get_contents('admin/admin.txt');
			$file = str_replace('{$pack_name}',$pack_name,$file);
			$file = str_replace('{$index_entrance}',$index_entrance,$file);
			$file = str_replace('{$admin_entrance}',$admin_entrance,$file);
			file_put_contents($admin_entrance,$file);
		}
		$info_text = '添加语言成功';
	}else{
		$info_text = '的输入不合法，添加语言失败';
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'file','mod'=>'lang_lists')));
}
function del_lang()
{
	$id = post('id');
	$obj = new varia();
	$obj->set_where('');
	$obj->set_where("var_id = $id");
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		$arr = explode('{v}',$one['var_value']);
		$pack_name = $arr[0];
		$index_entrance = $arr[1];
		$admin_entrance = $arr[2];
		if($index_entrance != 'index.php' && $admin_entrance != 'admin.php')
		{
			$obj->del();
			
			$table = array('article','att_art','att_goo','booking','cat_art','cat_goo','channel','comment','goods','link','menu','message','picture','research','varia');
			//以下表不处理：admin,safe,users
			for($i = 0; $i < count($table); $i ++)
			{
				$tab = substr($table[$i],0,3);
				$obj = new $table[$i];
				$obj->set_where('');
				$obj->set_where($tab . "_lang = '$pack_name'");
				$obj->del();
			}
			
			if(file_exists($index_entrance)) unlink($index_entrance);
			if(file_exists($admin_entrance)) unlink($admin_entrance);
			if(file_exists('languages/'.$pack_name)) del_dir('languages/'.$pack_name);
			echo 1;
		}
	}
}
function edit_lang()
{
	global $smarty,$lang;
	$path = post('path');
	$lang_text = post('lang_text','no_filter');
	file_put_contents($path,$lang_text);
	$smarty->assign('info_text','编辑语言包成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'file','mod'=>'lang_edit','path'=>rawurlencode($path))));
}
function upload()
{
	$dir = post('dir');
	$file = post('file');
	$suffix = strtolower(get_file_name($file,'.'));
	if(strpos('jpg,gif,png,bmp,jpeg,rar,zip,pdf',$suffix) !== false)
	{
		move_uploaded_file($_FILES['file_path']['tmp_name'],$dir.$file);
		set_cookie('file',$dir.$file);
	}
}
//新秀
?>