<?php
function reply_mes()
{
	global $smarty,$lang;
	$mes_id = post('mes_id');
	$mes_reply = post('mes_reply');
	$obj = new message();
	$obj->set_value('mes_reply',$mes_reply);
	$obj->set_where("mes_id = $mes_id");
	$obj->edit();
	
	$smarty->assign('info_text','回复留言成功');
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'service','mod'=>'message_sheet')));
}
function reply_comment()
{
	global $smarty,$lang;
	$com_id = post('com_id');
	$com_reply = post('com_reply');
	$obj = new comment();
	$obj->set_value('com_reply',$com_reply);
	$obj->set_where("com_id = $com_id");
	$obj->edit();
	
	$smarty->assign('info_text','回复评论成功');
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'service','mod'=>'comment_sheet')));
}
function add_or_edit_link()
{
	global $smarty,$lang;
	$lin_id = post('lin_id');
	$lin_word = post('lin_word');
	$lin_url = post('lin_url');
	$lin_img = post('lin_img');
	$lin_title = post('lin_title');
	if($lin_img == 'http://' || $lin_img == '')
	{
		$lin_img = 'none';
	}
	$obj = new link();
	$obj->set_value('lin_word',$lin_word);
	$obj->set_value('lin_url',$lin_url);
	$obj->set_value('lin_img',$lin_img);
	$obj->set_value('lin_title',$lin_title);
	if($lin_id != '')
	{
		$obj->set_where("lin_id = $lin_id");
		$obj->edit();
		$info_text = '修改友情链接成功';
	}else{
		$obj->set_value('lin_lang',S_LANG);
		$obj->add();
		$info_text = '添加友情链接成功';
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['return_list']);
	$smarty->assign('link_href',url(array('channel'=>'service','mod'=>'link_list')));
}
//新秀
?>