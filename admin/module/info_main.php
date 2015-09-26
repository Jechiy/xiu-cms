<?php
function module_info_main()
{
	switch(post('cmd'))
	{
		case 'admin_login': admin_login();break;
	}
}
function admin_login()
{
	safe('admin_login');
	global $smarty,$lang;
	$username = substr(post('username'),0,30);
	$password = substr(post('password'),0,30);
	if($username == '' || $password == '')
	{
		unset_session('admin_username');
		unset_session('admin_password');
		$info_text = '对不起，用户名和密码不能为空';
		$link_text = '返回重新登录';
	}else{
		$password = md5($password);
		$obj = new admin();
		$obj->set_field('adm_id,adm_last_login');
		$obj->set_where("adm_username = '$username'");
		$obj->set_where("adm_password = '$password'");
		$one = $obj->get_one();
		if(count($one) !== 0)
		{
			set_session('session_id',session_id());
			set_session('admin_username',$username);
			set_session('admin_password',$password);
			$adm_id = $one['adm_id'];
			$adm_prev_login = $one['adm_last_login'];
			$adm_last_login = time();
			$obj->set_value('adm_prev_login',$adm_prev_login);
			$obj->set_value('adm_last_login',$adm_last_login);
			$obj->set_where('');
			$obj->set_where("adm_id = $adm_id");
			$obj->edit();
			$info_text = '欢迎使用新秀文章管理系统后台';
			$link_text = '进入后台';
		}else{
			unset_session('session_id');
			unset_session('admin_username');
			unset_session('admin_password');
			$info_text = '对不起，用户名不存在或密码不正确';
			$link_text = '返回重新登录';
		}
	}
	$smarty->assign('info_text',$info_text);
	$smarty->assign('link_text',$link_text);
	$smarty->assign('link_href',$_SERVER['PHP_SELF']);
}
//新秀
?>