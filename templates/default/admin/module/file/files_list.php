{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.upload_file}</span></div>
	<div class="main">
		<form id="form_upl_file" method="post" enctype="multipart/form-data" action="{url channel='deal' dir='file'}" target="deal">
			<input name="cmd" type="hidden" value="upload" />
			<input name="dir" type="hidden" value="resource/" />
			<input name="file" type="hidden" value="" />
			<input name="file_path" type="file" onChange="do_upload('form_upl_file',0)" />
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>下载资源</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>资源地址</td>
				<td width="120px">数据库相关</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$list name=list item=item}
			<tr>
				<td>http://{$host}/resource/{$item.name}</td>
				<td>
					{if $item.id}ID:{$item.id}{else}<span class="red">无关</span>{/if}
				</td>
				<td>
					{if not $item.id}<a onClick="del_file('resource/{$item.name}')">[{$lang.delete}]</a>{else}{$lang.none}{/if}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<iframe class="deal" name="deal"></iframe>