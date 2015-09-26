{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>修改密码</span></div>
	<div class="main">
	<form id="form_edit_admin" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_admin" />
			<input name="adm_id" type="hidden" value="{$admin.adm_id}" />
			<table class="table">
				<tr>
					<td>用户名：</td>
					<td><input class="text" name="username" type="text" disabled="disabled" value="{$admin.adm_username}" /></td>
				</tr>
				<tr>
					<td>密码：</td>
					<td><input class="text" name="adm_password" type="password" /></td>
				</tr>
				<tr>
					<td>重复密码：</td>
					<td><input class="text" name="re_password" type="password" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="button" onclick="check_edit_admin()" value="{$lang.submit}" />
						</div>
					</td>
				</tr>
			</table>
	</form>
	</div>
</div>
{literal}
<script language="javascript">
	function check_edit_admin()
	{
		var obj = document.getElementById("form_edit_admin");
		var str = "";
		if(obj.adm_password.value.length < 5){
			str = "密码长度不能小于5个字符";
		}else if(obj.adm_password.value != obj.re_password.value){
			str = "两次输入密码不一致";
		}
		if(str != "")
		{
			alert(str);
		}else{
			obj.submit();
		}
	}
</script>
{/literal}
