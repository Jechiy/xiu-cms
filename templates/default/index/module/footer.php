{*<?php exit();?>*}
<div id="footer">
	<div class="nav">
		{foreach from=$footer_nav name=footer_nav item=item}
		<a href="{$item.men_url}">{$item.men_name}</a>
		{if !$smarty.foreach.footer_nav.last}|{/if}
		{/foreach}
	</div>
	<div class="info">
		{include file="module/copyright.php"}
		<a href="{$site.record_url}" target="_blank">{$site.record}</a>
		<a href="{$site.tech_url}" target="_blank">{$site.tech}</a>
		{$site.statistical_code}
	</div>
</div>
<!-- 新秀 -->