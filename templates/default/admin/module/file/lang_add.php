{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>添加语言</span></div>
	<div class="main">
		<form id="form_add_lang" method="post" action="{url channel=$global.channel}">
		<input name="cmd" type="hidden" value="add_lang" />
		<table class="table">
			<tr>
				<td>中文名：</td>
				<td><input name="chinese_name" type="text" class="text" maxlength="50" /></td>
			</tr>
			<tr>
				<td>外语名：</td>
				<td><input name="foreign_name" type="text" class="text" maxlength="50" /></td>
			</tr>
			<tr>
				<td>语言包：</td>
				<td><input name="pack_name" type="text" class="text" maxlength="50" /></td>
			</tr>
			<tr>
				<td>前台入口：</td>
				<td><input name="index_entrance" type="text" class="text" maxlength="50" /></td>
			</tr>
			<tr>
				<td>后台入口：</td>
				<td><input name="admin_entrance" type="text" class="text" maxlength="50" /></td>
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