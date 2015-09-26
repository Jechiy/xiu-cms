<?php
function module_info_main()
{
	switch(post('cmd'))
	{
		case 'add_message': add_message();break;
		case 'add_comment': add_comment();break;
	}
}
function add_message()
{
	safe('message');
	global $global,$smarty,$lang;
	$mes_type = post('type');
	$mes_username = post('username');
	$mes_email = post('email');
	$mes_title = post('title');
	$mes_text = post('text');
	$mes_show = post('show');
	if($mes_type == '' || $mes_username == '' || $mes_email == '' || $mes_title == '' || $mes_text == '')
	{
		$info_text = $lang['submit_error_info'];
	}else{
		$mes_add_time = time();
		if($mes_show != '2')
		{
			$mes_show = '0';
		}
		$obj = new message();
		$obj->set_value('mes_type',$mes_type);
		$obj->set_value('mes_username',$mes_username);
		$obj->set_value('mes_email',$mes_email);
		$obj->set_value('mes_title',$mes_title);
		$obj->set_value('mes_text',$mes_text);
		$obj->set_value('mes_add_time',$mes_add_time);
		$obj->set_value('mes_show',$mes_show);
		$obj->set_value('mes_lang',S_LANG);
		$obj->add();
		if(intval(get_varia('sentmail')))
		{
			$email_title = '您的网站有了新的留言';
			$email_text = "[$mes_type] $mes_title <br /> $mes_text";
			call_send_email($email_title,$email_text,$mes_username,$mes_email);
		}
		$info_text = $lang['submit_message'];
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['go_back']);
	$smarty->assign('link_href',url(array('channel'=>'message')));	
}
function add_comment()
{
	safe('comment');
	global $global,$smarty,$lang;
	$channel = post('channel');
	$com_page_id = post('page_id');
	$com_username = post('username');
	$com_email = post('email');
	$com_rank = post('rank');
	$com_text = post('text');
	if($channel == '' || $com_page_id == '' || $com_username == '' || $com_email == '' || $com_rank == '' || $com_text == '')
	{
		$info_text = $lang['submit_error_info'];
	}else{
		$com_channel_id = get_id('channel','cha_code',$channel);
		$com_add_time = time();
		$obj = new comment();
		$obj->set_value('com_channel_id',$com_channel_id);
		$obj->set_value('com_page_id',$com_page_id);
		$obj->set_value('com_username',$com_username);
		$obj->set_value('com_email',$com_email);
		$obj->set_value('com_rank',$com_rank);
		$obj->set_value('com_text',$com_text);
		$obj->set_value('com_add_time',$com_add_time);
		$obj->set_value('com_show',0);
		$obj->set_value('com_lang',S_LANG);
		$obj->add();
		if(intval(get_varia('sentmail')))
		{
			$email_title = '您的网站有了新的评论';
			$str = get_data($channel,$com_page_id,substr($channel,0,3).'_title');
			$email_text = '评论：《' . $str . '》<br />' . $com_text;
			call_send_email($email_title,$email_text,$com_username,$com_email);
		}
		$info_text = $lang['submit_comment'];
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$lang['go_back']);
	$smarty->assign('link_href',url(array('channel'=>$channel,'id'=>$com_page_id)));
}
//新秀
?>