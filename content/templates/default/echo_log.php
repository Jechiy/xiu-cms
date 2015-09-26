<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
  <div id="contentleft">
    <h2><?php topflg($top); ?><?php echo $log_title; ?></h2>
    <p class="date">
      <time>时间 ：<?php echo gmdate('Y-n-j', $date); ?></time>&nbsp;&nbsp;<span>作者： <?php blog_author($author); ?></span>&nbsp;&nbsp;<span>分类： <?php blog_sort($logid); ?></span>&nbsp;&nbsp;<span>评论: [ <?php echo $comnum; ?> ] 条</span>&nbsp;&nbsp;<span>浏览: [ <?php echo $views; ?> ] 次</span>
    </p>
	<?php echo $log_content; ?>
	<p class="tag"><?php blog_tag($logid); ?></p>
	<?php doAction('log_related', $logData); ?>
	<div class="nextlog"><?php neighbor_log($neighborLog); ?></div>
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div class="clear"></div>
</div><!--end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>