<?php
switch($db_type)
{
	case 'mysql':install_mysql();break;
	case 'access':install_access();break;
}
function install_mysql()
{
	global $db_host,$db_name,$db_user,$db_pass,$db_prefix;
	$db_host = post('db_host');
	$db_name = post('db_name');
	$db_user = post('db_user');
	$db_pass = post('db_pass');
	$db_prefix = post('db_prefix');
	
	$help = '';
	if($db_host == '' || $db_name == '' || $db_user == '')
	{
		echo '数据库信息不足，安装失败！<br />';
		echo $help; exit();
	}elseif(mysql_connect($db_host,$db_user,$db_pass)){
		if(mysql_select_db($db_name))
		{
			echo '连接数据库成功，正在创建数据表...<br />';
		}else{
			echo '数据库'.$db_name.'不存在，正在创建数据库...<br />';
			if(mysql_query('create database '.$db_name))
			{
				echo '创建数据库成功，重新连接数据库...<br />';
				if(!mysql_select_db($db_name))
				{
					echo '连接数据库失败，退出安装！<br />';
					echo $help; exit();
				}
			}else{
				echo '创建数据库失败，退出安装！<br />';
				echo $help; exit();
			}
		}
		if(mysql_query("select * from ".$db_prefix."varia"))
		{
			echo '检测到数据表已存在，安装失败！如果您之前已经安装过一次，重新安装之前请先清空数据库或更换数据表前缀。<br />';
			echo $help; exit();
		}
	}else{
		echo '连接数据库失败，请检查您所填写的数据库信息是否正确。<br />';
		echo $help; exit();
	}
	mysql_query('set names utf8');
	
	//创建数据表
	$sql = "create table if not exists ".$db_prefix."admin(
		adm_id int(11) not null primary key auto_increment,
		adm_username varchar(50),
		adm_password varchar(50),
		adm_grade int(11) default 0,
		adm_power text,
		adm_prev_login int(11) default 0,
		adm_last_login int(11) default 0
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."advert(
		adv_id int(11) not null primary key auto_increment,
		adv_name varchar(50),
		adv_code text
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."article(
		art_id int(11) not null primary key auto_increment,
		art_channel_id int(11) default 0,
		art_cat_id int(11) default 0,
		art_lang varchar(50) default 'none',
		art_title varchar(250),
		art_img varchar(250),
		art_x_img varchar(250),
		art_more_img text,
		art_text text,
		art_short_text text,
		art_author text,
		art_attribute text,
		art_keywords varchar(250),
		art_description varchar(250),
		art_hits int(11) default 0,
		art_add_time int(11) default 0,
		art_best int(11) default 0,
		art_top int(11) default 0,
		art_index int(11) default 0,
		art_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."att_art(
		att_id int(11) not null primary key auto_increment,
		att_channel_id int(11) default 0,
		att_cat_id int(11) default 0,
		att_lang varchar(50) default 'none',
		att_code varchar(50),
		att_name varchar(50),
		att_top int(11) default 0,
		att_index int(11) default 0,
		att_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."cat_art(
		cat_id int(11) not null primary key auto_increment,
		cat_parent_id int(11) default 0,
		cat_channel_id int(11) default 0,
		cat_lang varchar(50) default 'none',
		cat_name varchar(50),
		cat_template varchar(50),
		cat_best int(11) default 0,
		cat_top int(11) default 0,
		cat_index int(11) default 0,
		cat_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."channel(
		cha_id int(11) not null primary key auto_increment,
		cha_lang varchar(50) default 'none',
		cha_code varchar(50),
		cha_name varchar(50),
		cha_original int(11) default 0,
		cha_top int(11) default 0,
		cha_index int(11) default 0,
		cha_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."comment(
		com_id int(11) not null primary key auto_increment,
		com_channel_id int(11) default 0,
		com_lang varchar(50) default 'none',
		com_page_id int(11) default 0,
		com_username varchar(50),
		com_email varchar(50),
		com_text text,
		com_reply text,
		com_rank int(11) default 0,
		com_add_time int(11) default 0,
		com_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."link(
		lin_id int(11) not null primary key auto_increment,
		lin_lang varchar(50) default 'none',
		lin_word varchar(50),
		lin_url varchar(250),
		lin_img varchar(250),
		lin_title varchar(100),
		lin_lock int(11) default 0,
		lin_top int(11) default 0,
		lin_index int(11) default 0,
		lin_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."menu(
		men_id int(11) not null primary key auto_increment,
		men_lang varchar(50) default 'none',
		men_type varchar(50),
		men_name varchar(50),
		men_url varchar(250),
		men_top int(11) default 0,
		men_index int(11) default 0,
		men_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."message(
		mes_id int(11) not null primary key auto_increment,
		mes_lang varchar(50) default 'none',
		mes_type varchar(50),
		mes_username varchar(50),
		mes_email varchar(50),
		mes_title varchar(100),
		mes_text text,
		mes_reply text,
		mes_add_time int(11) default 0,
		mes_show int(11) default 1
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."safe(
		saf_id int(11) not null primary key auto_increment,
		saf_ip varchar(50),
		saf_action varchar(50),
		saf_time int(11) default 0
		) engine=myisam default charset=utf8";
	sql_query($sql);
	
	$sql = "create table if not exists ".$db_prefix."varia(
		var_id int(11) not null primary key auto_increment,
		var_lang varchar(50) default 'none',
		var_name varchar(50),
		var_value varchar(250),
		var_text text
		) engine=myisam default charset=utf8";
	sql_query($sql);
}
function install_access()
{
	global $conn,$db_name,$db_prefix;
	$random = str_pad(mt_rand(1,pow(10,8) - 1),8,'0',STR_PAD_LEFT);
	$random .= str_pad(mt_rand(1,pow(10,8) - 1),8,'0',STR_PAD_LEFT);
	$random .= str_pad(mt_rand(1,pow(10,8) - 1),8,'0',STR_PAD_LEFT);
	$db_name = '#' . $random . '.mdb';
	$database = '../data/' . $db_name;
	if(!copy('#data.mdb',$database))
	{
		echo '复制文件失败，您的网站目录可能没有写入权限，或者没有启用父路径。<br />';
		//echo '操作上若有不明之处，...';
		exit();
	}
	$connstr = 'provider=microsoft.jet.oledb.4.0;data source='.realpath($database);
	$conn = new com('adodb.connection',NULL,65001);
	$conn->open($connstr);
	
	//创建数据表
	$sql = "create table ".$db_prefix."admin(
		adm_id long identity primary key,
		adm_username varchar(50),
		adm_password varchar(50),
		adm_grade long default 0,
		adm_power text,
		adm_prev_login long default 0,
		adm_last_login long default 0
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."advert(
		adv_id long identity primary key,
		adv_name varchar(50),
		adv_code text
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."article(
		art_id long identity primary key,
		art_channel_id long default 0,
		art_cat_id long default 0,
		art_lang varchar(50) default 'none',
		art_title varchar(250),
		art_img varchar(250),
		art_x_img varchar(250),
		art_more_img text,
		art_text text,
		art_short_text text,
		art_author text,
		art_attribute text,
		art_keywords varchar(250),
		art_description varchar(250),
		art_hits long default 0,
		art_add_time long default 0,
		art_best long default 0,
		art_top long default 0,
		art_index long default 0,
		art_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."att_art(
		att_id long identity primary key,
		att_channel_id long default 0,
		att_cat_id long default 0,
		att_lang varchar(50) default 'none',
		att_code varchar(50),
		att_name varchar(50),
		att_top long default 0,
		att_index long default 0,
		att_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."cat_art(
		cat_id long identity primary key,
		cat_parent_id long default 0,
		cat_channel_id long default 0,
		cat_lang varchar(50) default 'none',
		cat_name varchar(50),
		cat_template varchar(50),
		cat_best long default 0,
		cat_top long default 0,
		cat_index long default 0,
		cat_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."channel(
		cha_id long identity primary key,
		cha_lang varchar(50) default 'none',
		cha_code varchar(50),
		cha_name varchar(50),
		cha_original long default 0,
		cha_top long default 0,
		cha_index long default 0,
		cha_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."comment(
		com_id long identity primary key,
		com_channel_id long default 0,
		com_lang varchar(50) default 'none',
		com_page_id long default 0,
		com_username varchar(50),
		com_email varchar(50),
		com_text text,
		com_reply text,
		com_rank long default 0,
		com_add_time long default 0,
		com_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."link(
		lin_id long identity primary key,
		lin_lang varchar(50) default 'none',
		lin_word varchar(50),
		lin_url varchar(250),
		lin_img varchar(250),
		lin_title varchar(100),
		lin_lock long default 0,
		lin_top long default 0,
		lin_index long default 0,
		lin_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."menu(
		men_id long identity primary key,
		men_lang varchar(50) default 'none',
		men_type varchar(50),
		men_name varchar(50),
		men_url varchar(250),
		men_top long default 0,
		men_index long default 0,
		men_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."message(
		mes_id long identity primary key,
		mes_lang varchar(50) default 'none',
		mes_type varchar(50),
		mes_username varchar(50),
		mes_email varchar(50),
		mes_title varchar(100),
		mes_text text,
		mes_reply text,
		mes_add_time long default 0,
		mes_show long default 1
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."safe(
		saf_id long identity primary key,
		saf_ip varchar(50),
		saf_action varchar(50),
		saf_time long default 0
		)";
	sql_query($sql);
	
	$sql = "create table ".$db_prefix."varia(
		var_id long identity primary key,
		var_lang varchar(50) default 'none',
		var_name varchar(50),
		var_value varchar(250),
		var_text text
		)";
	sql_query($sql);
}
//新秀
?>