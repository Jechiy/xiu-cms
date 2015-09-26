{*<?php exit();?>*}
<div id="mes_main">
	<div class="mes_sheet">
		<ul>
			{foreach from=$message name=message item=item}
			<li>
				<table>
					<tr>
						<td height="30px"><b>{$item.mes_username}：</b><span>{$item.mes_title}</span>&nbsp;&nbsp;[ {$item.mes_add_time|date_format:"%Y-%m-%d %H:%M:%S"} ]</td>
					</tr>
					<tr>
						<td><div>{$item.mes_text}</div></td>
					</tr>
					{if $item.mes_reply}
					<tr>
						<td><div class="reply"><span>{$lang.reply}：</span>{$item.mes_reply}</div></td>
					</tr>
					{/if}
				</table>
			</li>
			{/foreach}
		</ul>
		{if !$message}<div class="not_found">{$lang.not_found}</div>{/if}
	</div>
	{$prefix = $global.channel}
	{include file="module/page_link.php" page=$global.page}
</div>
<!-- 新秀 -->