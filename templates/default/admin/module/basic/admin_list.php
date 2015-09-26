{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>管理员帐号</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>用户名</td>
				<td width="50px">级别</td>
				<td>上次登录时间</td>
				<td>最后登录时间</td>
				<td width="170px">{$lang.operate}</td>
			</tr>
			{foreach from=$admin name=admin item=item}
			<tr>
				<td>{$item.adm_username}</td>
				<td>{$item.adm_grade}</td>
				<td>{if $item.adm_prev_login}{$item.adm_prev_login|date_format:"%Y-%m-%d %H:%M:%S"}{else}0{/if}</td>
				<td>{if $item.adm_last_login}{$item.adm_last_login|date_format:"%Y-%m-%d %H:%M:%S"}{else}0{/if}</td>
				<td>
					{if $me.adm_id == $item.adm_id || $me.adm_grade < $item.adm_grade}
					<a onclick="jump('{url channel=$global.channel mod='admin_edit' id=$item.adm_id}')">[修改密码]</a>
					{else}
					<a onclick="no_power()">[修改密码]</a>
					{/if}
					{if $me.adm_grade < $item.adm_grade}
					<a href="{url channel=$global.channel mod='admin_power' id=$item.adm_id}">[权限设置]</a>
					<a onclick="del_admin('{$item.adm_id}')">[{$lang.delete}]</a>
					{else}
					<a onclick="no_power()">[权限设置]</a>
					<a onclick="no_power()">[{$lang.delete}]</a>
					{/if}
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="5">
					<div class="bt_row">
						<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='admin_add'}')" value="{$lang.add}" />
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
{literal}
<script language="javascript">
	function no_power()
	{
		alert("对不起，您只能对下级帐号进行操作");
	}
	function del_admin(val)
	{
		if(confirm("您确定要删除该帐号吗？"))
		{
			ajax("post","?/deal/dir-basic/","cmd=del_admin&id=" + val,
			function(data)
			{
				if(data == 1) document.location.replace(document.location.href);
			});
		}
	}
</script>
{/literal}