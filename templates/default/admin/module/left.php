{*<?php exit();?>*}
<div id="left">
	<ul id="menu">
		{foreach from=$nav_left name=nav_left item=item}
		<li><a href="?/{$item.men_url}">{$item.men_name}</a></li>
		{/foreach}
	</ul>
</div>