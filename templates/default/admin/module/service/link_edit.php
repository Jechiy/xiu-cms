{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>添加友情链接</span></div>
	<div class="main">
		<form id="form_edit_link" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_or_edit_link" />
			<input name="lin_id" type="hidden" value="{$link.lin_id}" />
			<table class="table">
				<tr>
					<td>文字：</td>
					<td><input name="lin_word" type="text" class="text" maxlength="40" value="{$link.lin_word}" /></td>
				</tr>
				<tr>
					<td>网址：</td>
					<td><input name="lin_url" type="text" class="text" maxlength="200" value="{$link.lin_url}" /></td>
				</tr>
				<tr>
					<td>图片：</td>
					<td><input name="lin_img" type="text" class="text" maxlength="200" value="{if $link.lin_img != 'none'}{$link.lin_img}{else}http://{/if}" /></td>
				</tr>
				<tr>
					<td>描述：</td>
					<td><input name="lin_title" type="text" class="text" maxlength="200" value="{$link.lin_title}" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
							<input class="button" type="button" onclick="go_back()" value="{$lang.go_back}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>