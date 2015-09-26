<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="pragma" content="no-cache" />
	<title>sinsiu cms 1.0 beta8 安装</title>
	<style type="text/css">
		body{padding:50px;font-family:"微软雅黑";}
		table{width:500px;border:0;margin:0 auto;background:#FFF;color:#FFF;}
		td{border:0;padding:5px;background:#69C;vertical-align:middle;}
		table .c{text-align:center;}
		table .l{text-align:right;width:190px;}
		table .title{height:50px;font-size:22px;font-weight:bold;}
		table .bt_row{height:50px;}
		table .text{width:200px;border:1px solid #FFF;}
		#mysql_info{display:none;background:#69C;}
		.button{*padding:4px 4px 0 4px;*line-height:11px;*margin:0 0 -1px 0;cursor:pointer;}
	</style>
</head>
<body>
<form name="install" method="post" action="deal.php">
	<table cellspacing="1" cellpadding="0">
		<tr>
			<td colspan="2" class="c title">sinsiu cms 1.0 beta8 安装</td>
		</tr>
		<tr>
			<td colspan="2" class="c">
				<input name="db_type" type="radio" value="mysql" onclick="cheak_mysql()" checked="checked" />MYSQL数据库&nbsp;&nbsp;
				<input name="db_type" type="radio" value="access" onclick="cheak_access()" />ACCESS数据库
			</td>
		</tr> 
		<tr>
			<td class="l">数据库主机名：</td>
			<td><input id="mysql_info_1" class="text" name="db_host" type="text" value="localhost" /></td>
		</tr>
		<tr>
			<td class="l">数据库名：</td>
			<td><input id="mysql_info_2" class="text" name="db_name" type="text" /></td>
		</tr>
		<tr>
			<td class="l">数据库用户名：</td>
			<td><input id="mysql_info_3" class="text" name="db_user" type="text" /></td>
		</tr>
		<tr>
			<td class="l">数据库密码：</td>
			<td><input id="mysql_info_4" class="text" name="db_pass" type="password" /></td>
		</tr>
		<tr>
			<td class="l">数据表前缀：</td>
			<td><input class="text" name="db_prefix" type="text" value="art_" /></td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td class="l">后台帐号：</td>
			<td><input class="text" name="admin_name" type="text" /></td>
		</tr>
		<tr>
			<td class="l">后台密码：</td>
			<td><input class="text" name="admin_pwd" type="password" /></td>
		</tr>
		<tr>
			<td class="l">重复密码：</td>
			<td><input class="text" name="re_pwd" type="password" /></td>
		</tr>
		<tr>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td class="l">电子邮箱：</td>
			<td><input class="text" name="email" type="text" /></td>
		</tr>
		<tr>
			<td colspan="2" class="c bt_row"><input class="button" type="button" onclick="do_submit()" value="开始安装" /></td>
		</tr>
	</table>
</form>
<script language="javascript">
function ajax(type,file,text,func)
{
	var XMLHttp_Object;
	try{XMLHttp_Object = new ActiveXObject("Msxml2.XMLHTTP");}
	catch(new_ieerror)
	{
		try{XMLHttp_Object = new ActiveXObject("Microsoft.XMLHTTP");}
		catch(ieerror){XMLHttp_Object = false;}
	}
	if(!XMLHttp_Object && typeof XMLHttp_Object != "undefiend")
	{
		try{XMLHttp_Object = new XMLHttpRequest();}
		catch(new_ieerror){XMLHttp_Object = false;}
	}
	type = type.toUpperCase();
	if(type == "GET") file = file + "?" + text;
	XMLHttp_Object.open(type,file,true);
	if(type == "POST") XMLHttp_Object.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	XMLHttp_Object.onreadystatechange = function ResponseReq()
	{
		if(XMLHttp_Object.readyState == 4) func(XMLHttp_Object.responseText);
	};
	if(type == "GET") text = null;
	XMLHttp_Object.send(text);
}
/////////////////////////////////////////////////////////////
function cheak_mysql()
{
	for(i = 1; i <= 4; i ++)
	{
		document.getElementById("mysql_info_" + i).disabled = false;
		document.getElementById("mysql_info_" + i).value = "";
	}
	document.getElementById("mysql_info_1").value = "localhost";
}
function cheak_access()
{
	for(i = 1; i <= 4; i ++)
	{
		document.getElementById("mysql_info_" + i).disabled = true;
		document.getElementById("mysql_info_" + i).value = "Access数据库无需填写此项";
	}
	document.getElementById("mysql_info_4").value = "Access";
}
function do_submit()
{
	var obj = document.install;
	var cmd = "";
	var db_type = "mysql";
	for(i = 0; i < obj.db_type.length; i++)
	{
		if(obj.db_type[i].checked)
		{
			db_type = obj.db_type[i].value;
		}
	}
	if(obj.admin_name.value == "")
	{
		alert("后台帐号不能为空");
	}else if(obj.admin_pwd.value == ""){
		alert("后台密码不能为空");
	}else if(obj.re_pwd.value == ""){
		alert("两次输入密码不一致");
	}else{
		if(db_type == "mysql")
		{
			cmd = "db_type=" + db_type
			+ "&db_name=" + obj.db_name.value
			+ "&db_host=" + obj.db_host.value
			+ "&db_user=" + obj.db_user.value
			+ "&db_pass=" + obj.db_pass.value
			+ "&db_prefix=" + obj.db_prefix.value;
		}else if(db_type == "access"){
			cmd = "db_type=" + db_type;
		}
		ajax("post","ajax.php",cmd,
		function(data)
		{
			if(data == 1)
			{
				obj.submit();
			}else{
				alert(data);
			}
		});	
	}
}
</script>
</body>
</html>