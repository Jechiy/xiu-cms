<div class="block">
	<div class="head"><span>语言包 - {$global.name}</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>文件名</td>
				<td width="150px">{$lang.operate}</td>
			</tr>
			{foreach from=$lang_files name=lang_files item=item}
			<tr>
				<td>{$item.path}</td>
				<td>
					<a href="{url channel='file' mod='lang_edit' path=$item.path_str}">[{$lang.edit}]</a>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>