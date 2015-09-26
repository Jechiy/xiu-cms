{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.upload_img}</span></div>
	<div class="main">
		<form id="form_upl_img" method="post" enctype="multipart/form-data" action="{url channel='deal' dir='goods'}" target="deal">
			<input name="cmd" type="hidden" value="upload" />
			<input name="dir" type="hidden" value="{$dir_path}/" />
			<input name="file" type="hidden" value="" />
			<input name="file_path" type="file" onChange="do_upload('form_upl_img',0)" />
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>图片列表</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td width="150px">图片预览</td>
				<td>图片地址</td>
				<td width="120px">数据库相关</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$list name=list item=item}
			<tr>
				<td><img src="{$dir_path}/{$item.name}" height="30px" /></td>
				<td>http://{$host}/{$dir_path}/{$item.name}</td>
				<td>
					{if $item.id}ID:{$item.id}{else}<span class="red">无关</span>{/if}
				</td>
				<td>
					<a href="{$dir_path}/{$item.name}">[{$lang.view}]</a>
					{if not $item.id}<a onClick="del_file('{$dir_path}/{$item.name}')">[{$lang.delete}]</a>{/if}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<iframe class="deal" name="deal"></iframe>
