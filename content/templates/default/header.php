<?php
/*
Template Name:官方默认主题
Description:修改官方默认的模板，做成自适应的样子，以满足多种设备自适应
Version:1.2
Author:网页工坊
Author Url:http://www.dnfen.com
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link rel="stylesheet" type="text/css" href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" />
<script type="text/javascript" src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" ></script>
<script type="text/javascript" src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/media.css" />
<?php doAction('index_head'); ?>
</head>
<body>
<header id="header">
  <h1><a href="<?php echo BLOG_URL; ?>" title="<?php echo $blogname; ?>"><?php echo $blogname; ?></a></h1>
  <h3><?php echo $bloginfo; ?></h3>
</header>
<nav id="nav">
  <?php blog_navi();?>
</nav>
<div class="clear"></div>