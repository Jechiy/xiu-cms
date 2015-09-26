{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>备份数据库</span></div>
	<div class="main">
		<form id="form_db_backup" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="db_backup" />
			<table class="table">
				<tr>
					<td>备份数据库：</td>
					<td><input class="button" type="submit" value="立即备份" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>备份管理</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>已备份数据库</td>
				<td>{$lang.operate}</td>
			</tr>
			{foreach from=$restore name=restore item=item}
			<tr>
				<td>{$item.file}</td>
				<td>
					<span class="red" onClick="db_restore('{$item.file}')">[还原]</span>
					<span class="red" onClick="del_file('data/backup/{$item.file}')">[{$lang.delete}]</span>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		1、本功能目前只能备份ACCESS数据库，如果您使用的是MYSQL数据库，本功能不起作用。
	</div>
</div>
{literal}
<script language="javascript">
	function db_restore(val)
	{
		if(confirm("您确定要还原该备份文件吗？"))
		{
			ajax("post","?/deal/dir-basic/","cmd=db_restore&file=" + val,
			function(data)
			{
				if(data == 1)
				{
					alert("还原数据库成功");
				}
			});
		}
	}
</script>
{/literal}