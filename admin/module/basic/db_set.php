<?php
function module_db_set()
{
	global $smarty;
	$arr = array();
	$i = 0;
	$dir = dir('data/backup');
	while(($file = $dir->read()) ==! false)
	{
		if($file != '.' && $file != '..')
		{
			$arr[$i++]['file'] = iconv('GB2312','UTF-8',$file);
		}
	}
	$dir->close();
	$smarty->assign('restore',$arr);
}
//新秀
?>