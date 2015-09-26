<div class="box list">
	<div class="head"><span>推荐文章</span><a class="more" href="{url channel='article' best='1'}">更多&gt;&gt;</a></div>
	<div class="main">
		{foreach from=$best_article name=best_article item=item}
		<div><a href="{url channel=$item.channel id=$item.art_id}" title="{$item.art_title}" target="_blank">{$item.short_title}</a></div>
		{/foreach}
	</div>
</div>
<!-- 新秀 -->