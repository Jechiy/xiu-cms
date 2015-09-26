<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php doAction('index_loglist_top'); ?>
<div id="content">
  <div id="contentleft">
    <?php 
    if (!empty($logs)):
    foreach($logs as $value): 
    ?>
    <h2><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
    <p class="date">
    <time>时间 ：<?php echo gmdate('Y-n-j', $value['date']); ?></time>&nbsp;&nbsp;<span>作者： <?php blog_author($value['author']); ?></span>&nbsp;&nbsp;<span>分类： <?php blog_sort($value['logid']); ?></span>&nbsp;&nbsp;<span><a href="<?php echo $value['log_url']; ?>#comments">评论: [ <?php echo $value['comnum']; ?> ] 条</a></span>&nbsp;&nbsp;<span><a href="<?php echo $value['log_url']; ?>">浏览: [ <?php echo $value['views']; ?> ] 次</a></span>
    </p>
    <?php echo $value['log_description']; ?>
    <p class="tag"><?php blog_tag($value['logid']); ?></p>
    <hr class="chr" />
    <div class="clear"></div>
    <?php 
    endforeach;
    else:
    ?>
	<h2>未找到</h2>
	<p>抱歉，没有符合您查询条件的结果。</p>
    <?php endif;?>
    <div id="pagenavi">
	  <?php echo $page_url;?>
    </div>
</div>
<?php include View::getView('side');?>
</div>
<?php include View::getView('footer');?>