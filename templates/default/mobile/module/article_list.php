{*<?php exit();?>*}
{if $show_all_art != 1}
	{foreach from=$best_art_cat name=best_art_cat item=cat}
		{if $smarty.foreach.best_art_cat.index % 3 == 0}<div>{/if}
		<div class="box list">
			<div class="head">
				<span>{$cat.cat_name}</span>
				<a class="more" href="{url channel=$cat.channel cat=$cat.cat_id}">更多&gt;&gt;</a>
			</div>
			<div class="main">
				{foreach from=$art_list[$cat.cat_id] name=art_list item=item}
				<div><a href="{url channel=$cat.channel id=$item.art_id}" title="{$item.art_title}" target="_blank">{$item.short_title}</a></div>
				{/foreach}
			</div>
		</div>
		{if $smarty.foreach.best_art_cat.index % 3 == 2 || $smarty.foreach.best_art_cat.last}<div class="clear"></div></div>{/if}
	{/foreach}
{/if}
<!-- 新秀 -->