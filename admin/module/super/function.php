<?php
function if_add_channel($original,$cha_code,$cha_name)
{
	if(strlen($cha_code) > 3 && filter_keyword($cha_code))
	{
		if($original != '' && $cha_code != '' && $cha_name != '')
		{
			$flag = 1;
			for($i = 0; $i < strlen($cha_code); $i ++)
			{
				$val = substr($cha_code,$i,1);
				if($i == 0)
				{
					if(ord($val) < ord('a') || ord($val) > ord('z'))
					{
						$flag = 0;
						break;
					}
				}else{
					if((ord($val) < ord('a') || ord($val) > ord('z')) && (ord($val) < ord('0') || ord($val) > ord('9')))
					{
						$flag = 0;
						break;
					}
				}
			}
			if($flag)
			{
				$obj = new channel();
				$obj->set_where("cha_code = '$cha_code'");
				$one = $obj->get_one();
				if(count($one) == 0)
				{
					return 1;
				}else{
					return 4;
				}
			}else{
				return 3;
			}
		}else{
			return 2;
		}
	}else{
		return 4;
	}
}
function filter_keyword($cha_code)
{
	$keywords = '|index|about|goods|article|recruit|download|message|search|user|info|admin|njb|';
	if(strpos($keywords,'|'.substr($cha_code,0,3)) === false)
	{
		return true;
	}else{
		return false;
	}
}
function do_add_channel($original,$cha_code,$cha_name,$word_1,$word_2)
{
	//判断频道是否已存在
	$obj = new channel();
	$obj->set_where('');
	$obj->set_where("cha_code = '$cha_code'");
	$channel = $obj->get_one();
	if(count($channel))
	{
		return 0;
	}
	
	//添加频道记录
	$cha_original = get_id('channel','cha_code',$original);
	$obj = new channel();
	$obj->set_value('cha_code',$cha_code);
	$obj->set_value('cha_name',$cha_name);
	$obj->set_value('cha_original',$cha_original);
	$obj->set_value('cha_lang',S_LANG);
	$obj->add();
	
	$obj = new varia();
	//添加前台导航（导航管理）
	if($original == 'about')
	{	
		$obj->set_value('var_name','nav_stage_'.$cha_code);
		$obj->set_value('var_value',$cha_name);
		$obj->add();
	}
	//添加后台导航（导航管理）
	$obj->clear_value();
	$obj->set_value('var_name','nav_admin_'.$cha_code);
	$obj->set_value('var_value',$cha_name);
	$obj->add();
	//添加后台导航菜单
	$obj = new menu();
	$obj->set_value('men_type','admin_header');
	$obj->set_value('men_name',$cha_name);
	$obj->set_value('men_url',$cha_code.'/mod-sheet/');
	$obj->add();
	$obj->clear_value();
	$obj->set_value('men_type','admin_'.$cha_code);
	$obj->set_value('men_name',$cha_name.'列表');
	$obj->set_value('men_url',$cha_code.'/mod-sheet/');
	$obj->add();
	$obj->clear_value();
	$obj->set_value('men_type','admin_'.$cha_code);
	$obj->set_value('men_name','添加'.$cha_name);
	$obj->set_value('men_url',$cha_code.'/mod-add/');
	$obj->add();
	if($original == 'article' || $original == 'goods')
	{
		$obj->clear_value();
		$obj->set_value('men_type','admin_'.$cha_code);
		$obj->set_value('men_name',$cha_name.'分类');
		$obj->set_value('men_url',$cha_code.'/mod-cat_list/');
		$obj->add();
	}
	if($original == 'goods')
	{
		$obj->clear_value();
		$obj->set_value('men_type','admin_'.$cha_code);
		$obj->set_value('men_name',$cha_name.'属性');
		$obj->set_value('men_url',$cha_code.'/mod-att_list/');
		$obj->add();
	}
	//添加前台导航菜单
	$obj = new menu();
	$obj->set_value('men_lang',S_LANG);
	$obj->set_value('men_type','header');
	$obj->set_value('men_name',$cha_name);
	$obj->set_value('men_url',$cha_code.'/');
	$obj->add();
	//添加属性
	if($original == 'download')
	{
		$obj = new att_art();
		$obj->set_where('');
		$obj->set_where("att_channel_id = $cha_original");
		$list = $obj->get_list();
		$channel_id = get_id('channel','cha_code',$cha_code);
		for($i = 0; $i < count($list); $i ++)
		{
			$obj->clear_value();
			$obj->set_value('att_channel_id',$channel_id);
			$obj->set_value('att_lang',$list[$i]['att_lang']);
			$obj->set_value('att_code',$list[$i]['att_code']);
			$obj->set_value('att_name',$list[$i]['att_name']);
			$obj->add();
		}
	}
	//创建语言包
	$path = 'languages/'.S_LANG.'/admin/';
	if(file_exists($path.$original.'.txt'))
	{
		$str = file_get_contents($path.$original.'.txt');
		$str = str_replace($word_1,$word_2,$str);
		file_put_contents($path.$cha_code.'.txt',$str);
	}	
	$path = 'languages/'.S_LANG.'/index/';
	if(file_exists($path.$original.'.txt'))
	{
		$str = file_get_contents($path.$original.'.txt');
		$str = str_replace($word_1,$word_2,$str);
		file_put_contents($path.$cha_code.'.txt',$str);
	}
	//修改伪静态文件
	$path = 'admin/module/basic/htaccess.txt';
	if(file_exists($path))
	{
		$str = file_get_contents($path);
		$str .= "\n" . 'RewriteRule ^'.$cha_code.'/(.*)$ index.php?/'.$cha_code.'/$1';
		$str = str_replace("\n\n","\n",$str);
		file_put_contents($path,$str);
	}
	
	return 1;
}
function do_del_channel($channel_id)
{
	//判断频道是否已存在
	$obj = new channel();
	$obj->set_where('');
	$obj->set_where("cha_id = $channel_id");
	$channel = $obj->get_one();
	if(count($channel))
	{
		$cha_code = $channel['cha_code'];
		$obj->del();
	}else{
		return 0;
	}
	
	//删除前台导航（导航管理）
	$obj = new varia();
	$obj->set_where("var_name = 'nav_stage_".$cha_code."'");
	$obj->del();
	//删除后台导航（导航管理）
	$obj->set_where('');
	$obj->set_where("var_name = 'nav_admin_".$cha_code."'");
	$obj->del();
	//删除后台导航菜单
	$obj = new menu();
	$obj->set_where("men_type = '$cha_code'");
	$obj->del();
	$obj->set_where('');
	$obj->set_where("men_type = 'admin_header'");
	$obj->set_where("men_url = '".$cha_code."/mod-sheet/'");
	$obj->del();
	$obj->set_where('');
	$obj->set_where("men_type = 'admin_".$cha_code."'");
	$obj->set_where("men_url = '".$cha_code."/mod-sheet/'");
	$obj->del();
	$obj->set_where('');
	$obj->set_where("men_type = 'admin_".$cha_code."'");
	$obj->set_where("men_url = '".$cha_code."/mod-add/'");
	$obj->del();
	$obj->set_where('');
	$obj->set_where("men_type = 'admin_".$cha_code."'");
	$obj->set_where("men_url = '".$cha_code."/mod-cat_list/'");
	$obj->del();
	$obj->set_where('');
	$obj->set_where("men_type = 'admin_".$cha_code."'");
	$obj->set_where("men_url = '".$cha_code."/mod-att_list/'");
	$obj->del();
	//删除前台导航菜单
	$obj = new menu();
	$obj->set_where("men_type = 'header'");
	$obj->set_where("men_url = '".$cha_code."/'");
	$obj->del();
	//删除分类
	$obj = new cat_art();
	$obj->set_where('');
	$obj->set_where("cat_channel_id = $channel_id");
	$obj->del();
	//删除内容
	$obj = new article();
	$obj->set_where('');
	$obj->set_where("art_channel_id = $channel_id");
	$obj->del();
	//删除属性
	$obj = new att_art();
	$obj->set_where('');
	$obj->set_where("att_channel_id = $channel_id");
	$obj->del();
	//删除语言包
	$path = 'languages/'.S_LANG.'/admin/'.$cha_code.'.txt';
	if(file_exists($path))
	{
		unlink($path);
	}	
	$path = 'languages/'.S_LANG.'/index/'.$cha_code.'.txt';
	if(file_exists($path))
	{
		unlink($path);
	}
	//修改伪静态文件
	$path = 'admin/module/basic/htaccess.txt';
	if(file_exists($path))
	{
		$str = file_get_contents($path);
		$rule = "\n" . 'RewriteRule ^'.$cha_code.'/(.*)$ index.php?/'.$cha_code.'/$1';
		$str = str_replace($rule,'',$str);
		file_put_contents($path,$str);
	}
	
	return 1;
}
//新秀
?>