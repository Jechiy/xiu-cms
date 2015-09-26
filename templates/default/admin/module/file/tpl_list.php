{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>选择模板</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>模板预览</td>
				<td width="100px">模板名称</td>
				<td>模板说明</td>
				<td width="150px">{$lang.operate}</td>
			</tr>
			{foreach from=$tpl name=tpl item=item}
			<tr>
				<td class="pic2"><div><img src="templates/{$item.name}/images/this.jpg" onload="picresize(this,160,160)" /></div></td>
				<td><a href="templates/{$item.name}/images/this.jpg">{$item.name}</a></td>
				<td class="content" style="text-align:left;">
					{$item.text}
					<a href="templates/{$item.name}/readme.txt">[阅读原文]</a>
				</td>
				<td>
					{if $S_TPL_PATH != $S_ROOT|cat:'templates/'|cat:$item.name|cat:'/'}
					<a onClick="select_tpl('{$item.name}')">[使用该模板]</a>
					{else}
					<span class="red">[当前模板]</span>
					{/if}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
{literal}
<script language="javascript">
	function select_tpl(val)
	{
		if(confirm("您确定使用该模板吗？"))
		{
			ajax("post","?/deal/dir-file/","cmd=select_tpl&tpl=" + val,
			function(data)
			{
				if(data == 1) document.location.replace(document.location.href);
			});
		}
	}
</script>
{/literal}