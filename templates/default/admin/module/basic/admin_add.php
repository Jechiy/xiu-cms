{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>添加管理员帐号</span></div>
	<div class="main">
	<form id="form_add_admin" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_admin" />
			<table class="table">
				<tr>
					<td>用户名：</td>
					<td><input class="text" name="adm_username" type="text" /></td>
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
							<input class="button" type="button" onclick="check_add_admin()" value="{$lang.submit}" />
						</div>
					</td>
				</tr>
			</table>
	</form>
	</div>
</div>
{literal}
<script language="javascript">
	function check_add_admin()
	{
		var obj = document.getElementById("form_add_admin");
		var str = "";
		if(obj.adm_username.value.length < 5)
		{
			str = "用户名长度不能小于5个字符";
		}else if(obj.adm_password.value.length < 5){
			str = "密码长度不能小于5个字符";
		}else if(obj.adm_password.value != obj.re_password.value){
			str = "两次输入密码不一致";
		}
		ajax("post","?/deal/dir-site/","cmd=check_admin_name&name=" + obj.adm_username.value,
		function(data)
		{
			if(data == 1)
			{
				str = "对不起，用户名已存在";
			}
			if(str != "")
			{
				alert(str);
			}else{
				obj.submit();
			}
		});
	}
</script>
{/literal}
