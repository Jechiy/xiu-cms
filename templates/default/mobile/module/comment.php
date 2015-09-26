{*<?php exit();?>*}
<div id="comment">
	<div class="head"><span>{$lang.user_comment}</span></div>
	<div class="main">
		<div class="mes_sheet">
			<ul>
			{foreach from=$comment name=comment item=item}
				<li>
					<table>
						<tr>
							<td height="30px"><span>{$item.com_username}</span>&nbsp;&nbsp;{$item.com_add_time|date_format:"%Y-%m-%d %H:%M:%S"}&nbsp;&nbsp;{$lang.said}：</td>
							<td width="80px">{section name=loop loop=$item.com_rank}<img src="{$S_TPL_PATH}images/star.gif" />{/section}</td>
						</tr>
						<tr>
							<td colspan="2"><div class="txt">{$item.com_text}</div></td>
						</tr>
						{if $item.com_reply}
						<tr>
							<td colspan="2"><div class="reply"><span>{$lang.reply}：</span>{$item.com_reply}</div></td>
						</tr>
						{/if}
					</table>
				</li>
			{/foreach}
			</ul>
			{if !$comment}<div class="not_found">{$lang.not_found}</div>{/if}
		</div>
		{$prefix = $global.channel|cat:'/id-'|cat:$global.id}
		{include file="module/page_link.php" page=$global.page}
	</div>
</div>
<!-- 新秀 -->