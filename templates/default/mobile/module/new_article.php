<div class="box list">
	<div class="head"><span>最新文章</span><a class="more" href="{url channel='article'}">更多&gt;&gt;</a></div>
	<div class="main">
		{foreach from=$new_article name=new_article item=item}
		<div><a href="{url channel=$item.channel id=$item.art_id}" title="{$item.art_title}" target="_blank">{$item.short_title}</a></div>
		{/foreach}
	</div>
</div>
<!-- 新秀 -->