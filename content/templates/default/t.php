<?php 
/**
 * 微语部分
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content">
  <div id="contentleft">
    <div id="tw">
      <ul>
        <?php 
        foreach($tws as $val):
        $author = $user_cache[$val['author']]['name'];
        $avatar = empty($user_cache[$val['author']]['avatar']) ? 
        BLOG_URL . 'admin/views/images/avatar.jpg' : 
        BLOG_URL . $user_cache[$val['author']]['avatar'];
        $tid = (int)$val['id'];
        $img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
    ?> 
        <li class="li">
          <div class="main_img"><img src="<?php echo $avatar; ?>" /></div>
          <div class="post1"><span><?php echo $author; ?></span><p><?php echo $val['t'];?><br /><?php echo $img; ?></p>
            <div class="bttome">
              <span class="time">发布时间： <?php echo $val['date'];?></span>
              <span class="post"><a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">有 [ <i id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></i> ] 条回复</a></span>
            </div>
          </div>
   	      <ul id="r_<?php echo $tid;?>" class="r clear"></ul>
          <?php if ($istreply == 'y'):?>
          <div class="huifu" id="rp_<?php echo $tid;?>">
	        <textarea id="rtext_<?php echo $tid; ?>"></textarea>
            <div class="clear"></div>

            <table class="tbutton">
              <tr>
                <td style="margin-right: 10px;" >昵称：<input type="text" id="rname_<?php echo $tid; ?>" value="" /></td>
                <td style="margin-right: 10px;display:<?php if($reply_code == 'n'){echo 'none';}?>">验证码：<input type="text" id="rcode_<?php echo $tid; ?>" value="" /></td>
                <td style="margin-right: 10px;"><?php echo $rcode; ?></td>
                <td><input class="button_p" type="button" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" /></td>
              </tr>
            </table>
          </div>
          <?php endif;?>
          
        </li>
        <?php endforeach;?>
	  <li id="pagenavi"><?php echo $pageurl;?></li>
    </ul>
  </div><!--end #tw-->
  </div><!--end #contentleft-->
<?php include View::getView('side');?>
</div>
<?php include View::getView('footer');?>
?>