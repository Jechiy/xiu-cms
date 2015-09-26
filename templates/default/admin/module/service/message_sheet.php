{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>留言列表</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>留言内容</td>
				<td width="80px">通过审核</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$message name=message item=item}
			<tr>
				<td style="text-align:left;line-height:22px;">
					<div>
						【{$item.mes_type}】&nbsp;
						<b>{$item.mes_username}：</b><span>{$item.mes_title}</span>
						&nbsp;[{$item.mes_add_time|date_format:"%Y-%m-%d %H:%M:%S"}]
					</div>
					<div>{$item.mes_text}</div>
					{if $item.mes_reply != ''}
					<div><span class="red">管理员回复：</span>{$item.mes_reply}</div>
					{/if}
				</td>
				<td>
					{if $item.mes_show != 2}
					<input type="checkbox" {if $item.mes_show == 1}checked{/if} onClick="set_order('show','message',{$item.mes_id},this.checked)" />
					{else}悄悄话{/if}
				</td>
				<td>
					<a href="{url channel=$global.channel mod='message_edit' id=$item.mes_id}">[回复]</a>
					<a onClick="del('message|{$item.mes_id}')">[{$lang.delete}]</a>
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="3">
					{$prefix = $global.channel|cat:'/mod-message_sheet'}
					{include file="module/page_link.php" page=$global.page}
				</td>
			</tr>
		</table>
	</div>
</div>
