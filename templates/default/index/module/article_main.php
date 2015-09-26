{*<?php exit();?>*}
{if $show_sheet == 1}
	<div class="art_sheet list">
		{if $article}
			<div class="main">
				{foreach from=$article name=article item=item}
				<div><a href="{url channel=$global.channel id=$item.art_id}" title="{$item.art_title}" target="_blank">{$item.art_title}</a><span>{$item.art_add_time|date_format:"%Y-%m-%d"}</span></div>
				{/foreach}
			</div>
		{else}
			<div class="not_found">{$lang.not_found}</div>
		{/if}
		{include file="module/page_link.php" page=$global.page}
	</div>
{else}
	<div id="article">
		<div class="title">
			<h2>{$article.art_title}</h2>
		</div>
		<div class="message">
			{$lang.author}：{$article.art_author}&nbsp;&nbsp;&nbsp;{$lang.add_time}：{$article.art_add_time|date_format:"%Y-%m-%d %H:%M:%S"}
		</div>
		
		<div class="main">
			{$article.art_text}
			<div class="clear"></div>
		</div>
		{run module='ad' id='3'}
		<div class="share">
			{$share_code}
			<div class="clear"></div>
		</div>
		{$prefix = $global.channel}
		{include file="module/prev_next.php" id=$global.id}
	</div>
{/if}
<!-- 新秀 -->
