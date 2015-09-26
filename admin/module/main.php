<?php
function module_main()
{
	global $global,$smarty;
	$cmd = post('cmd');
	if($global['admin_id'] > 0)
	{
	$smarty->assign('show_main',1);
	if($cmd == '')
	{
			$smarty->assign('show_info',0);
			if(check_power())
			{
				$smarty->assign('check_power',1);
				if($global['mod'] != 'main')
				{
					$path = 'admin/module/'.$global['channel'].'/'.$global['mod'].'.php';
					if(!file_exists($path))
					{
						$path = 'admin/module/'.$global['original'].'/'.$global['mod'].'.php';
					}
					include($path);
					$func = 'module_'.$global['mod'];
					$func();
				}
			}else{
				$smarty->assign('check_power',0);
			}
	}else{
	$smarty->assign('show_info',1);
			$smarty->assign('check_power',1);
			$path = 'admin/module/'.$global['channel'].'/deal.php';
			if(!file_exists($path))
			{
				$path = 'admin/module/'.$global['original'].'/deal.php';
			}
	include($path);
			$cmd();
	}
	}else{
	$smarty->assign('show_main',0);
	}
}
//新秀
?>