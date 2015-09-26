<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="clear"></div>
<footer id="footerbar">
  Powered by <a href="http://www.emlog.net" title="采用emlog系统">emlog</a> <a href="http://www.dnfen.com" target="_blank" class="dnfen" title="网页工坊">网页工坊</a> <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
</footer>
<?php doAction('index_footer'); ?>
<script>prettyPrint();</script>
</body>
</html>