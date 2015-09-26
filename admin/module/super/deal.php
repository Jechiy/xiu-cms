<?php
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
		$obj->set_where('');
		$obj->set_where("men_id = $id");
		$obj->edit();
	}
	$smarty->assign('info_text','修改导航成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'super','mod'=>'nav_list')));
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
	$obj->add();
	$smarty->assign('info_text','添加导航成功');
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'super','mod'=>'nav_list')));
}
function add_channel()
{
	global $smarty,$lang;
	include('admin/module/super/function.php');
	$original = post('original');
	$cha_code = post('cha_code');
	$cha_name = post('cha_name');
	$word_1 = post('word_1');
	$word_2 = post('word_2');
	$flag = if_add_channel($original,$cha_code,$cha_name);
	if($flag == 1)
	{
		$result = do_add_channel($original,$cha_code,$cha_name,$word_1,$word_2);
	}else{
		$result = $flag;
	}
	switch($result)
	{
		case 0: $info_text = '创建频道失败';break;
		case 1: $info_text = '创建频道成功';break;
		case 2: $info_text = '您所提交的信息不足或有误';break;
		case 3: $info_text = '页面字符名必须是以字母开头、字母数字组合的字符串';break;
		case 4: $info_text = '页面字符名已经存在或长度小于4个字符';break;
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'super','mod'=>'channel_add')));
}
function del_channel()
{
	include('admin/module/super/function.php');
	$id = post('id');
	if(is_numeric($id))
	{
		$result = do_del_channel($id);
		echo $result;
	}else{
		echo 0;
	}
}
function edit_channel_name()
{
	global $smarty;
	for($i = 0; $i < count($_POST['cha_id']); $i ++)
	{
		$cha_name = strict($_POST['cha_name'][$i]);
		$cha_id = strict($_POST['cha_id'][$i]);
		$obj = new channel();
		$obj->set_value('cha_name',$cha_name);
		$obj->set_where('cha_id = '.$cha_id);
		$obj->edit();
	}
	$smarty->assign('info_text','修改频道标题成功');
	$smarty->assign('link_text','返回上一页');
	$smarty->assign('link_href',url(array('channel'=>'super','mod'=>'channel_name')));
}
//新秀
?>