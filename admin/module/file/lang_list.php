<?php
function module_lang_list()
{
	global $global,$smarty;
	$arr = array();
	$i = 0;
	$dir = 'languages/'.$global['name'];	
	$lang_files = get_lang_files($arr,$i,$dir);
	$smarty->assign('lang_files',$lang_files);
}
function get_lang_files(&$arr,&$i,&$dir)
{
	if(is_dir($dir))
	{
		$list = scandir($dir);
		foreach($list as $file)
		{
			if($file != 'images' && $file != '.' && $file != '..')
			{
				$val = $dir.'/'.$file;
				if(!is_dir($val))
				{
					$arr[$i]['path'] = $val;
					$arr[$i]['path_str'] = rawurlencode($val);
					$i ++;
				}else{
					$arr = get_lang_files($arr,$i,$val);
				}
			}
		}
	}
	return $arr;
}
//新秀
?>