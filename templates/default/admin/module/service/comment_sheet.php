{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>评论列表</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>评论内容</td>
				<td width="80px">通过审核</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$comment name=comment item=item}
			<tr>
				<td style="text-align:left;line-height:22px;">
					<div>
						{section name=loop loop=$item.com_rank}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;
						<b>{$item.com_username}：</b><a href="{$S_ROOT}{url channel=$item.channel id=$item.com_page_id}" target="_blank">《{$item.title}》</a>
						&nbsp;[{$item.com_add_time|date_format:"%Y-%m-%d %H:%M:%S"}]
					</div>
					<div>{$item.com_text}</div>
					{if $item.com_reply != ''}
					<div><span class="red">管理员回复：</span>{$item.com_reply}</div>
					{/if}
				</td>
				<td>
					<input type="checkbox" {if $item.com_show == 1}checked{/if} onClick="set_order('show','comment',{$item.com_id},this.checked)" />
				</td>
				<td>
					<a href="{url channel=$global.channel mod='comment_edit' id=$item.com_id}">[回复]</a>
					<a onClick="del('comment|{$item.com_id}')">[{$lang.delete}]</a>
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="3">
					{$prefix = $global.channel|cat:'/mod-comment_sheet'}
					{include file="module/page_link.php" page=$global.page}
				</td>
			</tr>
		</table>
	</div>
</div>