<?php
$file = file_get_contents('config.php');
switch($db_type)
{
	case 'mysql':
	 $file = str_replace("\$config['S_DB_TYPE'] = '';","\$config['S_DB_TYPE'] = 'mysql';",$file);
	 $file = str_replace("\$config['S_DB_PATH'] = '';","\$config['S_DB_PATH'] = '".$db_host."';",$file);
	 $file = str_replace("\$config['S_DB_NAME'] = '';","\$config['S_DB_NAME'] = '".$db_name."';",$file);
	 $file = str_replace("\$config['S_DB_USER'] = '';","\$config['S_DB_USER'] = '".$db_user."';",$file);
	 $file = str_replace("\$config['S_DB_PWD'] = '';","\$config['S_DB_PWD'] = '".$db_pass."';",$file);
	 $file = str_replace("\$config['S_DB_PREFIX'] = '';","\$config['S_DB_PREFIX'] = '".$db_prefix."';",$file);
	break;
	case 'access':
	 $file = str_replace("\$config['S_DB_TYPE'] = '';","\$config['S_DB_TYPE'] = 'access';",$file);
	 $file = str_replace("\$config['S_DB_PATH'] = '';","\$config['S_DB_PATH'] = 'data/';",$file);
	 $file = str_replace("\$config['S_DB_NAME'] = '';","\$config['S_DB_NAME'] = '".$db_name."';",$file);
	 $file = str_replace("\$config['S_DB_PREFIX'] = '';","\$config['S_DB_PREFIX'] = '".$db_prefix."';",$file);
	break;
}
file_put_contents('../include/config.php',$file);
//新秀
?>