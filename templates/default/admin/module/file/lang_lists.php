{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>语言列表</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>中文名</td>
				<td>外语名</td>
				<td>语言包</td>
				<td>前台入口</td>
				<td>后台入口</td>
				<td width="150px">{$lang.operate}</td>
			</tr>
			{foreach from=$lang_list name=lang_list item=item}
			<tr>
				<td>{$item.chinese_name}</td>
				<td>{$item.foreign_name}</td>
				<td>{$item.pack_name}</td>
				<td>{$item.index_entrance}</td>
				<td>{$item.admin_entrance}</td>
				<td>
					{if $item.index_entrance != 'index.php'}
					<a onClick="del_lang('{$item.var_id}')">[{$lang.delete}]</a>
					{else}
					<span class="red">[系统保护]</span>
					{/if}
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="6">
					<div class="bt_row">
						<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='lang_add'}')" value="{$lang.add}" />
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>语言包</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>名称</td>
				<td width="150px">{$lang.operate}</td>
			</tr>
			{foreach from=$pack name=pack item=item}
			<tr>
				<td>{$item.name}</td>
				<td>
					<a href="{url channel='file' mod='lang_list' name=$item.name}">[{$lang.edit}]</a>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
{literal}
<script language="javascript">
	function del_lang(val)
	{
		if(confirm("您确定要删除该语言吗？"))
		{
			ajax("post","?/deal/dir-file/","cmd=del_lang&id=" + val,
			function(data)
			{
				if(data == 1) document.location.replace(document.location.href);
			});
		}
	}
</script>
{/literal}