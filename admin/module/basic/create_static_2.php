<?php
function do_create_static()
{
	$step = get_cookie('create_static_step');
	if($step != '')
	{
		switch($step)
		{
			case 'count':
				set_cookie('create_static_sum',step_count());
				set_cookie('create_static_id',get_start_id('goods','goods'));
			break;
			case 'goods_page':
				$val = step_create_single_page('goods','goods');
				if($val != 0)
				{
					set_cookie('create_static_id',$val);
				}else{
					set_cookie('create_static_step','article_page');
					set_cookie('create_static_id',get_start_id('article','article'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'article_page':
				$val = step_create_single_page('article','article');
				if($val != 0)
				{
					set_cookie('create_static_id',$val);
				}else{
					set_cookie('create_static_step','about_page');
					set_cookie('create_static_id',get_start_id('article','about'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'about_page':
				$val = step_create_single_page('article','about');
				if($val != 0)
				{
					set_cookie('create_static_id',$val);
				}else{
					set_cookie('create_static_step','end');
					set_cookie('create_static_page',1);
				}
			break;
		}
	}else{
		echo 'error';
	}
}
function step_count()
{
	$sum = 0;
	//计算产品单页数
	$num = get_single_page_sum('goods','goods');
	$sum += $num;
	//计算文章单页数
	$num = get_single_page_sum('article','article');
	$sum += $num;
	//计算关于我们单页数
	$num = get_single_page_sum('article','about');
	$sum += $num;
	return $sum;
}
function get_single_page_sum($table,$channel)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$obj = new $table;
	$obj->set_where($tab.'_show = 1');
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	return $obj->get_count();
}
function get_start_id($table,$channel)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$obj = new $table;
	$obj->set_where($tab.'_show = 1');
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	$obj->set_order('');
	$obj->set_order($tab.'_id','asc');
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		return $one[$tab.'_id'];
	}else{
		return 0;
	}
}
function step_create_single_page($table,$channel)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$step_id = intval(get_cookie('create_static_id'));
	$obj = new $table;
	$obj->set_where($tab.'_show = 1');
	$obj->set_where($tab."_id = $step_id");
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		$domain = get_domain();
		$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/id-'.$step_id.'/'.S_URL_SUFFIX;
		$html = file_get_contents($page_url);
		set_cookie('create_static_created',get_cookie('create_static_created') + 1);
	}
	$obj = new $table;
	$obj->set_where($tab.'_show = 1');
	$obj->set_where($tab."_id > $step_id");
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	$obj->set_order('');
	$obj->set_order($tab.'_id','asc');
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		return $one[$tab.'_id'];
	}else{
		return 0;
	}
}
//新秀
?>