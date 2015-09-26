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
	<div id="leave_word">
		<form id="form_add_message" method="post" action="{url entrance=$global.entrance channel='info'}">
			<input name="cmd" type="hidden" value="add_message"/>
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
					<td class="l">{$lang.message_type}：</td>
					<td>
						<input name="type" type="radio" value="{$lang.leave_word}" checked="checked" />{$lang.leave_word}&nbsp;&nbsp;
						<input name="type" type="radio" value="发布信息" />发布信息&nbsp;&nbsp;
					</td>
				</tr>
				<tr>
					<td class="l">{$lang.theme}：</td>
					<td>
						<input name="title" class="text" type="text" maxlength="80"/>&nbsp;&nbsp;
						<input name="show" type="checkbox" value="2"/>&nbsp;{$lang.secret}
					</td>
				</tr>
				<tr>
					<td class="l">{$lang.mes_content}：</td>
					<td><textarea name="text"></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="button" onclick="submit_add_message()" value="{$lang.submit}" />&nbsp;&nbsp;
							<input class="button" type="reset" value="{$lang.reset}"/>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script language="javascript">
	var lang_email_empty = "{$lang.email_empty}";
	var lang_mes_title_empty = "{$lang.mes_title_empty}";
	var lang_mes_text_empty = "{$lang.mes_text_empty}";
</script>
{literal}
<script language="javascript">
function submit_add_message()
{
	var str = "";
	var obj = document.getElementById("form_add_message");
	if(obj.email.value == ""){str += "-" + lang_email_empty + "\n";}
	if(obj.title.value == ""){str += "-" + lang_mes_title_empty + "\n";}
	if(obj.text.value == ""){str += "-" + lang_mes_text_empty + "\n";}
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