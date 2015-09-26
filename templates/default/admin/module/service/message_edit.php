{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>回复留言</span></div>
	<div class="main">
		<form id="form_reply_mes" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="reply_mes" />
			<input name="mes_id" type="hidden" value="{$global.id}" />
			<table class="table">
				<tr>
					<td style="line-height:22px;">
						<div>
							【{$message.mes_type}】&nbsp;
							<b>{$message.mes_username}：</b><span>{$message.mes_title}</span>
							&nbsp;[{$message.mes_add_time|date_format:"%Y-%m-%d %H:%M:%S"}]
						</div>
						<div>{$message.mes_text}</div>
					</td>
				</tr>
				<tr>
					<td>
						<textarea class="textarea" name="mes_reply" style="width:700px;height:200px;">{$message.mes_reply}</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.submit}" />
							<input class="button" type="button" onclick="go_back()" value="{$lang.go_back}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>