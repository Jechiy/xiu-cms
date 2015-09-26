{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>回复留言</span></div>
	<div class="main">
		<form id="form_reply_comment" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="reply_comment" />
			<input name="com_id" type="hidden" value="{$global.id}" />
			<table class="table">
				<tr>
					<td style="line-height:22px;">
						<div>
							{section name=loop loop=$comment.com_rank}<img src="{$S_TPL_PATH}images/star.gif" />{/section}&nbsp;
							<b>{$comment.com_username}：</b><a href="{$S_ROOT}{url channel=$comment.channel id=$comment.com_page_id}" target="_blank">《{$comment.title}》</a>
							&nbsp;[{$comment.com_add_time|date_format:"%Y-%m-%d %H:%M:%S"}]
						</div>
						<div>{$comment.com_text}</div>
					</td>
				</tr>
				<tr>
					<td>
						<textarea class="textarea" name="com_reply" style="width:700px;height:200px;">{$comment.com_reply}</textarea>
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