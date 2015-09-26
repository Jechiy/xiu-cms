{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>添加{$type_name}</span></div>
	<div class="main">
		<form id="form_add_nav" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_nav" />
			<input name="type" type="hidden" value="{$global.type}" />
			<table class="table">
				<tr>
					<td>文字：</td>
					<td><input name="word" type="text" class="text" maxlength="50" /></td>
				</tr>
				<tr>
					<td>链接：</td>
					<td><input name="link" type="text" class="text" maxlength="150" /></td>
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