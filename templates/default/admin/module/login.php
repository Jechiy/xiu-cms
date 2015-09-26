{*<?php exit();?>*}
<div id="login">
	<form method="post" action="{url channel='info'}">
		<input name="cmd" type="hidden" value="admin_login" />
		<table cellspacing="1" cellpadding="0">
			<tr>
				<td class="c title" colspan="2">{$site_title}登录</td>
			</tr>
			<tr>
				<td class="l">用户名：</td>
				<td class="r"><input class="text" name="username" type="text" /></td>
			</tr>
			<tr>
				<td class="l">密码：</td>
				<td class="r"><input class="text" name="password" type="password" /></td>
			</tr>
			<tr>
				<td class="c bt_row" colspan="2"><input class="button" type="submit" value="登录" /></td>
			</tr>
		</table>
	</form>
</div>