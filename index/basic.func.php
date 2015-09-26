<?php
function main()
{
	global $global,$smarty;
	set_global();
	if(S_HALF_STATIC)
	{
		if($global['url'] == '')
		{
			if(S_FLASH != 1)
			{
				$path = '/' . S_URL_SUFFIX;
			}else{
				$path = '/flash.html';
			}
		}else{
			$path = $global['url'];
		}
		$path = 'html' . $path;
		if(substr($path,-1) == '/')
		{
			$path .= S_URL_SUFFIX;
		}
		if(file_exists($path))
		{
			include($path);
			exit();
		}else{
			ob_start();
		}
	}
	if(S_FLASH && $_SERVER['REQUEST_URI'] == S_ROOT)
	{
		$path = 'index/flash.php';
	}else{
		include_all('index/class/parent');
		include_all('index/class');
		set_more_global();
		$path = 'index/' . $global['channel'] . '.php';
		if($global['url'] != '')
		{
			if(!file_exists($path))
			{
				$path = 'index/' . $global['original'] . '.php';
			}	
		}
	}
	include($path);
}
function set_more_global()
{
	global $global;
	$global['channel'] = get_global('channel','index');
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