<?php
//sql_query("insert into () values ('')");
sql_query("insert into ".$db_prefix."admin (adm_username,adm_password,adm_grade,adm_power) values ('$admin_name','".md5($admin_pwd)."','1','all')");
	
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章一类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章二类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章三类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章四类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章五类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','0','文章六类','1')");
sql_query("insert into ".$db_prefix."cat_art (cat_lang,cat_channel_id,cat_parent_id,cat_name,cat_best) values ('zh-cn','1','1','文章七类','0')");
	
sql_query("insert into ".$db_prefix."channel (cha_lang,cha_code,cha_name,cha_original) values ('zh-cn','article','文章中心','0')");
	
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','网站首页','index/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','全部文章','article/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章一类','article/cat-1/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章二类','article/cat-2/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章三类','article/cat-3/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章四类','article/cat-4/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章五类','article/cat-5/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','文章六类','article/cat-6/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','在线留言','message/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','header','新秀官网','http://www.sinsiu.com')");
	
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','首页','index/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','全部文章','article/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','文章一类','article/cat-1/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','文章二类','article/cat-2/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','文章三类','article/cat-3/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','文章四类','article/cat-4/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','文章五类','article/cat-5/')");
sql_query("insert into ".$db_prefix."menu (men_lang,men_type,men_name,men_url) values ('zh-cn','footer','在线留言','message/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','基本设置','basic/mod-basic_info/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','文章管理','article/mod-sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','用户互动','service/mod-message_sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','文件管理','file/mod-tpl_list/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','数据采集','data/mod-set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_header','高级应用','super/mod-channel_add/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','基本信息','basic/mod-basic_info/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','网站设置','basic/mod-site_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','导航管理','basic/mod-nav_list/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','模块启闭','basic/mod-show_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','安全设置','basic/mod-safe_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','静态设置','basic/mod-static_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','管理员帐号','basic/mod-admin_list/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','数据库管理','basic/mod-db_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','广告管理','basic/mod-advert_list/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_basic','其它设置','basic/mod-other/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_article','文章列表','article/mod-sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_article','添加文章','article/mod-add/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_article','文章分类','article/mod-cat_list/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_service','留言管理','service/mod-message_sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_service','评论管理','service/mod-comment_sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_service','友情链接','service/mod-link_list/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_file','选择模板','file/mod-tpl_list/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_file','图片管理','file/mod-pic_lists/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_file','语言设置','file/mod-lang_lists/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_file','资源管理','file/mod-files_list/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_data','采集设置','data/mod-set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_data','公共数据','data/mod-sheet/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_data','私人定制','data/mod-tailor_set/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_data','私有数据','data/mod-tailor_sheet/')");
	
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_super','新建频道','super/mod-channel_add/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_super','频道名称','super/mod-channel_name/')");
sql_query("insert into ".$db_prefix."menu (men_type,men_name,men_url) values ('admin_super','后台导航管理','super/mod-nav_list/')");
	
sql_query("insert into ".$db_prefix."link (lin_lang,lin_word,lin_url,lin_img,lin_title,lin_index,lin_lock) values ('zh-cn','宁波水处理','http://www.ningboshuichulishebei.com','none','宁波水处理','10','1')");
sql_query("insert into ".$db_prefix."link (lin_lang,lin_word,lin_url,lin_img,lin_title,lin_index,lin_lock) values ('zh-cn','宁波中水设备','http://www.xpdscl.com','none','宁波中水设备','9','1')");
sql_query("insert into ".$db_prefix."link (lin_lang,lin_word,lin_url,lin_img,lin_title,lin_index,lin_lock) values ('zh-cn','浙江水处理','http://www.sclxpd.com','none','浙江水处理','8','1')");
	
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_title','新秀文章管理系统 sinsiu cms 1.0 beta8')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_name','新秀工作室')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('none','site_domain','www.sinsiu.com')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_record','粤ICP备12345678号')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('none','site_record_url','http://www.sinsiu.com')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_tech','新秀工作室')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('none','site_tech_url','http://www.sinsiu.com')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_keywords','网站关键字')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_value) values ('zh-cn','site_description','网站描述')");
	
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_text) values ('none','statistical_code','统计代码')");
sql_query("insert into ".$db_prefix."varia (var_lang,var_name,var_text) values ('none','share_code','$share_code')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('languages','zh-cn{v}index.php{v}admin.php{v}中文{v}中文')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('index_art_list_len','10')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('art_list_len','20')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('single_page_static','0')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_admin_login_hours','1')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_admin_login_times','10')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_message_hours','1')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_message_times','3')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_comment_hours','1')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('safe_comment_times','20')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('sentmail','0')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('sentmail_smtp','smtp.163.com')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('sentmail_send','sinsiu_1_0_5@163.com')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('sentmail_password','sinsiu105')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('sentmail_receive','$email')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_username','')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_password','')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','1|今日热点|1|1')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','2|国内新闻|1|2')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','3|国际新闻|1|3')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','4|社会百态|1|4')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','5|娱乐明星|1|5')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','6|创业科技|1|6')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','7|军事历史|1|6')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','8|体育NBA|1|6')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','9|心灵鸡汤|1|6')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('data_cat','10|生活健康|1|6')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_stage_header','页头导航')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_stage_footer','页脚导航')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_header','后台主导航')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_basic','基本设置')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_article','文章管理')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_service','用户互动')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_file','文件管理')");
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('nav_admin_super','高级应用')");

sql_query("insert into ".$db_prefix."advert (adv_name,adv_code) values ('头部广告位','$ad_1')");
sql_query("insert into ".$db_prefix."advert (adv_name,adv_code) values ('中部广告位','$ad_2')");
sql_query("insert into ".$db_prefix."advert (adv_name,adv_code) values ('文末广告位','$ad_3')");
	
sql_query("insert into ".$db_prefix."varia (var_name,var_value) values ('version','sinsiu cms 1.0 beta8')");
	
//新秀
?>