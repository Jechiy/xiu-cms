<?php
function add_or_edit_article()
{
	global $global,$smarty,$lang;
	$art_id = post('art_id');
	$art_title = post('art_title');
	$art_cat_id = post('art_cat_id');
	$art_author = post('art_author');
	$att_url = post('file_path');
	$art_text = post('editor','loose');
	$art_keywords = post('art_keywords');
	$art_description = post('art_description');
	$art_add_time = time();
	$arr = array();
	$obj = new att_art();
	$obj->set_where('');
	$obj->set_where('att_channel_id = '.$global['channel_id']);
	$att = $obj->get_list();
	for($i = 0; $i < count($att); $i ++)
	{
		$att_value = post($att[$i]['att_code']);
		if($att_value != '')
		{
			$arr[$att[$i]['att_id']] = $att_value;
		}
	}
	$art_attribute = rawurlencode(json_encode($arr));
	if($art_cat_id == '')
	{
		$art_cat_id = 0;
	}
	$art_text = str_replace('<p><br/></p>','',$art_text);
	$art_text = str_replace('<p><br /></p>','',$art_text);
	$art_description = cut_str($art_description,250);
	$obj = new article();
	$obj->set_value('art_title',$art_title);
	$obj->set_value('art_cat_id',$art_cat_id);
	$obj->set_value('art_author',$art_author);
	$obj->set_value('art_text',$art_text);
	$obj->set_value('art_keywords',$art_keywords);
	$obj->set_value('art_description',$art_description);
	$obj->set_value('art_add_time',$art_add_time);
	$obj->set_value('art_attribute',$art_attribute);
	if($art_id != '')
	{
		$obj->set_where("art_id = $art_id");
		$obj->edit();
		$info_text = $lang['edit_article_success'];
	}else{
		$obj->set_value('art_channel_id',$global['channel_id']);
		$obj->set_value('art_lang',S_LANG);
		$obj->add();
		$info_text = $lang['add_article_success'];
	}
	if(intval(get_varia('single_page_static')))
	{
		$page_id = $art_id;
		if($page_id == '')
		{
			$obj->set_where("art_add_time = $art_add_time");
			$one = $obj->get_one();
			if(count($one))
			{
				$page_id = $one['art_id'];
			}
		}
		if($page_id != '')
		{
			$domain = get_domain();
			$page_url = 'http://' . $domain . S_ROOT . url(array('channel'=>$global['channel'],'id'=>$page_id));
			$html = file_get_contents($page_url);
		}
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>$global['channel'],'mod'=>'sheet')));
}
function add_or_edit_cat()
{
	global $global,$smarty,$lang;
	$cat_id = post('cat_id');
	$cat_parent_id = post('cat_parent_id');
	$cat_name = post('cat_name');
	$obj = new cat_art();
	$obj->set_value('cat_parent_id',$cat_parent_id);
	$obj->set_value('cat_name',$cat_name);
	if($cat_id != '')
	{
		$obj->set_where("cat_id = $cat_id");
		$obj->edit();
		$info_text = $lang['edit_cat_success'];
	}else{
		$obj->set_value('cat_channel_id',$global['channel_id']);
		$obj->set_value('cat_lang',S_LANG);
		$obj->add();
		$info_text = $lang['add_cat_success'];
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>$global['channel'],'mod'=>'cat_list')));
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