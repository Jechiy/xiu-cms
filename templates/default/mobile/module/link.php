{*<?php exit();?>*}
<div class="box" id="link">
	<div class="head"><span>{$lang.link}</span></div>
	<div class="main">
		{if $img_link}
		<div class="img">
		{foreach from=$img_link name=img_link item=item}
		<a href="{$item.lin_url}" title="{$item.lin_title}" target="_blank"><img src="{$item.lin_img}" /></a>
		{/foreach}
		<div class="clear"></div>
		</div>
		{/if}
		{if $word_link}
		<div class="word">
		{foreach from=$word_link name=word_link item=item}
		<a href="{$item.lin_url}" title="{$item.lin_title}" target="_blank">{$item.lin_word}</a>
		{/foreach}
		</div>
		{/if}
	</div>
</div>
<!-- 新秀 -->
