{*<?php exit();?>*}
<div class="here">
	<span>{if $cat_name}{$cat_name}{else}{$channel_title}{/if}</span>
	<div class="link">
		<a href="./">{$lang.home}</a>
		{if $channel_title}-&gt;<a href="{url channel=$global.channel}">{$channel_title}</a>{/if}
		{if $cat_name}-&gt;<a href="{url channel=$global.channel cat=$global.cat}">{$cat_name}</a>{/if}
		{if $page_title}-&gt;<a href="{url channel=$global.channel id=$global.id}">{$page_title|truncate:20}</a>{/if}
	</div>
</div>
<!-- 新秀 -->