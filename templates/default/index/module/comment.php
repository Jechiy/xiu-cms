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
		<div id="leave_word">
			<form id="form_add_comment" method="post" action="{url entrance=$global.entrance channel='info'}">
				<input name="cmd" type="hidden" value="add_comment"/>
				<input name="channel" type="hidden" value="{$global.channel}"/>
				<input name="page_id" type="hidden" value="{$global.id}"/>
				<table>
					<tr>
						<td class="l">{$lang.user_name}：</td>
						<td><input name="username" class="text" type="text" value="匿名用户" /></td>
					</tr>
					<tr>
						<td class="l">E-mail：</td>
						<td><input name="email" class="text" type="text" value="" /></td>
					</tr>
					<tr>
						<td class="l">{$lang.comment_rank}：</td>
						<td>
							<input name="rank" type="radio" value="1" />{section name=loop loop=1}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;&nbsp;
							<input name="rank" type="radio" value="2" />{section name=loop loop=2}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;&nbsp;
							<input name="rank" type="radio" value="3" />{section name=loop loop=3}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;&nbsp;
							<input name="rank" type="radio" value="4" />{section name=loop loop=4}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;&nbsp;
							<input name="rank" type="radio" value="5" checked="checked" />{section name=loop loop=5}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;&nbsp;
						</td>
					</tr>
					<tr>
						<td class="l">{$lang.comment_text}：</td>
						<td><textarea name="text"></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="bt_row">
								<input class="button" type="button" onclick="submit_add_comment()" value="{$lang.submit}" />&nbsp;&nbsp;
								<input class="button" type="reset" value="{$lang.reset}"/>
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<script language="javascript">
	var lang_email_empty = "{$lang.email_empty}";
	var lang_comment_text_empty = "{$lang.comment_text_empty}";
</script>
{literal}
<script language="javascript">
	function submit_add_comment()
	{
		var str = "";
		var obj = document.getElementById("form_add_comment");
		if(obj.email.value == ""){str += "-" + lang_email_empty + "\n";}
		if(obj.text.value == ""){str += "-" + lang_comment_text_empty + "\n";}
		if(str != "")
		{
			alert(str);
		}else{
			obj.submit();
		}
	}
</script>
{/literal}
<!-- 新秀 -->