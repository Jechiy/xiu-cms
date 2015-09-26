<?php
function main()
{
	global $global,$smarty;
	set_global();
	include_all('admin/class/parent');
	include_all('admin/class');
	set_more_global();
	$path = 'admin/admin.php';
	if($global['url'] != '')
	{
		$path2 = 'admin/'.$global['channel'].'.php';
		if(file_exists($path2))
		{
			$path = $path2;
		}
	}
	include($path);
}
function set_more_global()
{
	global $global;
	$global['admin_id'] = check_admin_login();
	$global['channel'] = get_global('channel','basic');
	$global['original'] = get_global('original','basic');
	$global['mod'] = get_global('mod','basic_info');
	$global['cat'] = get_global('cat',0);
	$global['page'] = get_global('page',1);
	$global['id'] = get_global('id',0);
	
	$global['original'] = $global['channel'];
	$global['channel_id'] = get_id('channel','cha_code',$global['channel']);
	if($global['channel_id'])
	{
		$original_id = get_data('channel',$global['channel_id'],'cha_original');
		if($original_id)
		{
			$global['original'] = get_data('channel',$original_id,'cha_code');
		}
	}
}
//新秀
?>