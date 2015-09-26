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
				set_cookie('create_static_page',1);
			break;
			case 'goods_sheet_page':
				$page_size = intval(get_varia('img_list_len'));
				$val = step_create_sheet_page('goods','goods',$page_size);
				if($val != 0)
				{
					set_cookie('create_static_page',$val);
				}else{
					set_cookie('create_static_step','goods_cat_sheet_page');
					set_cookie('create_static_cat',get_start_id('cat_goo','goods'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'goods_cat_sheet_page':
				$page_size = intval(get_varia('img_list_len'));
				$val = step_create_cat_sheet_page('goods','goods',$page_size);
				if($val != 0 || $val === 'next_cat')
				{
					if($val == 'next_cat')
					{
						set_cookie('create_static_page',1);
					}else{
						set_cookie('create_static_page',$val);
					}
				}else{
					set_cookie('create_static_step','article_sheet_page');
					set_cookie('create_static_id',get_start_id('article','article'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'article_sheet_page':
				$page_size = intval(get_varia('art_list_len'));
				$val = step_create_sheet_page('article','article',$page_size);
				if($val != 0)
				{
					set_cookie('create_static_page',$val);
				}else{
					set_cookie('create_static_step','article_cat_sheet_page');
					set_cookie('create_static_cat',get_start_id('cat_art','article'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'article_cat_sheet_page':
				$page_size = intval(get_varia('art_list_len'));
				$val = step_create_cat_sheet_page('article','article',$page_size);
				if($val != 0 || $val === 'next_cat')
				{
					if($val == 'next_cat')
					{
						set_cookie('create_static_page',1);
					}else{
						set_cookie('create_static_page',$val);
					}
				}else{
					set_cookie('create_static_step','recruit_sheet_page');
					set_cookie('create_static_id',get_start_id('article','recruit'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'recruit_sheet_page':
				$val = step_create_sheet_page('article','recruit',5);
				if($val != 0)
				{
					set_cookie('create_static_page',$val);
				}else{
					set_cookie('create_static_step','download_sheet_page');
					set_cookie('create_static_id',get_start_id('article','download'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'download_sheet_page':
				$val = step_create_sheet_page('article','download',5);
				if($val != 0)
				{
					set_cookie('create_static_page',$val);
				}else{
					set_cookie('create_static_step','message_sheet_page');
					set_cookie('create_static_id',get_start_id('message','message'));
					set_cookie('create_static_page',1);
				}
			break;
			case 'message_sheet_page':
				$page_size = 5;
				$val = step_create_sheet_page('message','message',$page_size);
				if($val != 0)
				{
					set_cookie('create_static_page',$val);
				}else{
					set_cookie('create_static_step','index_page');
				}
			break;
			case 'index_page':
				$domain = get_domain();
				$page_url = 'http://'.$domain.S_ROOT;
				$html = file_get_contents($page_url);
				set_cookie('create_static_created',get_cookie('create_static_created') + 1);
				set_cookie('create_static_step','index_channel_page');
			break;
			case 'index_channel_page':
				step_channel_page('index');
				set_cookie('create_static_step','about_channel_page');
			break;
			case 'about_channel_page':
				step_channel_page('about');
				set_cookie('create_static_step','goods_channel_page');
			break;
			case 'goods_channel_page':
				step_channel_page('goods');
				set_cookie('create_static_step','article_channel_page');
			break;
			case 'article_channel_page':
				step_channel_page('article');
				set_cookie('create_static_step','recruit_channel_page');
			break;
			case 'recruit_channel_page':
				step_channel_page('recruit');
				set_cookie('create_static_step','download_channel_page');
			break;
			case 'download_channel_page':
				step_channel_page('download');
				set_cookie('create_static_step','message_channel_page');
			break;
			case 'message_channel_page':
				step_channel_page('message');
				set_cookie('create_static_step','end');
			break;
		}
	}else{
		echo 'error';
	}
}
function step_count()
{
	$sum = 8;
	//计算产品单页数
	$num = get_single_page_sum('goods','goods');
	//计算产品无分类页数
	$page_size = intval(get_varia('img_list_len'));
	$sum += get_page_sum($num,$page_size);
	//计算产品分类页数
	$sum += get_sheet_page_sum('goods','goods',$page_size);
	//计算文章单页数
	$num = get_single_page_sum('article','article');
	//计算文章无分类页数
	$page_size = intval(get_varia('art_list_len'));
	$sum += get_page_sum($num,$page_size);
	//计算文章分类页数
	$sum += get_sheet_page_sum('article','article',$page_size);
	//计算关于我们单页数
	$num = get_single_page_sum('article','about');
	//计算人才招聘页数
	$num = get_single_page_sum('article','recruit');
	$sum += get_page_sum($num,5);
	//计算下载中心页数
	$num = get_single_page_sum('article','download');
	$sum += get_page_sum($num,5);
	//计算在线留言页数
	$num = get_single_page_sum('message','message');
	$sum += get_page_sum($num,5);
	return $sum;
}
function get_page_sum($record_count,$page_size)
{
	if($record_count % $page_size > 0)
	{
		return intval($record_count / $page_size) + 1;
	}else{
		return intval($record_count / $page_size);
	}
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
function get_sheet_page_sum($table,$channel,$page_size)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$sum = 0;
	$arr = array();
	$t = 'cat_'.$tab;
	$obj = new $t;
	$obj->set_where('cat_show = 1');
	if($channel_id)
	{
		$obj->set_where('cat_channel_id = '.$channel_id);
	}
	$list = $obj->get_list();
	for($i = 0; $i < count($list); $i++)
	{
		$arr[$i] = $list[$i]['cat_id'];
	}
	for($i = 0; $i < count($arr); $i++)
	{
		$family = implode(',',get_cat_family('cat_'.$tab,$arr[$i]));
		$obj = new $table;
		$obj->set_where($tab."_cat_id in ($family)");
		$obj->set_where($tab.'_show = 1');
		if($channel_id)
		{
			$obj->set_where($tab.'_channel_id = '.$channel_id);
		}
		$sum += get_page_sum($obj->get_count(),$page_size);
	}
	return $sum + count($arr);
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
	$obj->set_order($tab.'_id','asc');
	$one = $obj->get_one();
	if(count($one) > 0)
	{
		return $one[$tab.'_id'];
	}else{
		return 0;
	}
}
function step_create_sheet_page($table,$channel,$page_size)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$step_page = intval(get_cookie('create_static_page'));
	$page_sum = -1;
	$obj = new $table;
	$obj->set_where($tab.'_show = 1');
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	$record_count = $obj->get_count();
	if($record_count > 0)
	{
		$page_sum = get_page_sum($record_count,$page_size);
		if($page_sum >= $step_page)
		{
			$domain = get_domain();
			$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/page-'.$step_page.'/'.S_URL_SUFFIX;
			$html = file_get_contents($page_url);
			set_cookie('create_static_created',get_cookie('create_static_created') + 1);
		}
	}
	if($page_sum - $step_page >= 0)
	{
		return $step_page + 1;
	}else{
		return 0;
	}
}
function step_create_cat_sheet_page($table,$channel,$page_size)
{
	$channel_id = get_id('channel','cha_code',$channel);
	$tab = substr($table,0,3);
	$step_page = intval(get_cookie('create_static_page'));
	$step_cat = intval(get_cookie('create_static_cat'));
	$page_sum = -1;
	$family = implode(',',get_cat_family('cat_'.$tab,$step_cat));
	$domain = get_domain();
	$obj = new $table;
	$obj->set_where($tab."_cat_id in ($family)");
	$obj->set_where($tab.'_show = 1');
	if($channel_id)
	{
		$obj->set_where($tab.'_channel_id = '.$channel_id);
	}
	$record_count = $obj->get_count();
	if($record_count > 0)
	{
		$page_sum = get_page_sum($record_count,$page_size);
		if($page_sum >= $step_page)
		{
			if($step_page == 1)
			{
				$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/cat-'.$step_cat.'/'.S_URL_SUFFIX;
				$html = file_get_contents($page_url);
				set_cookie('create_static_created',get_cookie('create_static_created') + 2);
			}else{
				set_cookie('create_static_created',get_cookie('create_static_created') + 1);
			}
			$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/cat-'.$step_cat.'/page-'.$step_page.'/'.S_URL_SUFFIX;
			$html = file_get_contents($page_url);
		}
	}else{
		$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/cat-'.$step_cat.'/'.S_URL_SUFFIX;
		$html = file_get_contents($page_url);
		set_cookie('create_static_created',get_cookie('create_static_created') + 1);
	}
	$t = 'cat_'.$tab;
	$obj = new $t;
	$obj->set_where('cat_show = 1');
	$obj->set_where("cat_id > $step_cat");
	if($channel_id)
	{
		$obj->set_where('cat_channel_id = '.$channel_id);
	}
	$one = $obj->get_one();
	if($page_sum - $step_page >= 0)
	{
		return $step_page + 1;
	}else{
		if(count($one) > 0)
		{
			set_cookie('create_static_cat',$one['cat_id']);
			return 'next_cat';
		}else{
			return 0;
		}
	}
}
function step_channel_page($channel)
{
	$domain = get_domain();
	$page_url = 'http://'.$domain.S_ROOT.'?/'.$channel.'/'.S_URL_SUFFIX;
	$html = file_get_contents($page_url);
	set_cookie('create_static_created',get_cookie('create_static_created') + 1);
}
//新秀
?>