{*<?php exit();?>*}
<div id="header">
	<div class="top"></div>
	<div class="main">
		<div class="logo"><a href="./"><img src="{$S_ROOT}images/logo.png" /></a></div>
	</div>
</div>
<div id="nav">
	<ul>
		{foreach from=$nav name=nav item=item}
		<li><a href="{$item.men_url}" {if $item.target == 1}target="_blank"{/if}>{$item.men_name}</a></li>
		{/foreach}
		<div class="clear"></div>
	</ul>
</div>
<!-- 新秀 -->
