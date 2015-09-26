{*<?php exit();?>*}
<div id="right">
{if !$show_info && $check_power}
	<div id="core">
		{include file='module/'|cat:$global.original|cat:'/'|cat:$global.mod|cat:'.php'}
	</div>
{else}
	<div class="block">
		<div class="head"><span>系统信息</span></div>
		<div class="main">
			<div id="info">
				{if $check_power}
				<div class="main">
					<div class="txt">{$info_text}</div>
					<div class="link"><a href="{$link_href}">{$link_text}</a></div>
				</div>
				<script language="javascript">
					interval = setInterval("document.location.href = '{$link_href}'",3000);
				</script>
				{else}
				<div class="main">
					<div class="txt">对不起，您的权限不足，无法操作当前页面</div>
				</div>
				{/if}
			</div>
		</div>
	</div>
{/if}
</div>