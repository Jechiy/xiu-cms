{*<?php exit();?>*}
<div id="header">
	<div class="main">
		<div id="nav">
			{foreach from=$nav_header name=nav_header item=item}
			<a href="?/{$item.men_url}">{$item.men_name}</a>
			{/foreach}
			<div class="clear"></div>
		</div>
		<div class="link">
			<a href="./" target="_blank">网站首页</a>
			<a href="{url channel='out'}">退出系统</a>
		</div>
		{if $S_MULTILINGUAL}
		<div class="lang">
			当前语言：
			<select onchange="change_lang(this.value)">
				{foreach from=$lang_pack name=lang_pack item=item}
				<option {if $S_LANG == $item.pack_name}selected="selected"{/if} value="{$item.admin_entrance}{if $global.url}?{$global.url}{/if}">{$item.chinese_name}</option>
				{/foreach}
			</select>
		</div>
		{/if}
		<div class="clear"></div>
	</div>
</div>