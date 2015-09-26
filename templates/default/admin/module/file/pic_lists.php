{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.upload_img}</span></div>
	<div class="main">
		<form id="form_upl_img" method="post" enctype="multipart/form-data" action="{url channel='deal' dir='file'}" target="deal">
			<input name="cmd" type="hidden" value="upload" />
			<input name="dir" type="hidden" value="images/" />
			<input name="file" type="hidden" value="" />
			<input name="file_path" type="file" onChange="do_upload('form_upl_img',0)" />
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>公共图片</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td width="150px">图片预览</td>
				<td>图片地址</td>
				<td width="120px">数据库相关</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$list_public name=list_public item=item}
			<tr>
				<td><img src="images/{$item.name}" height="30px" /></td>
				<td>http://{$host}/images/{$item.name}</td>
				<td>
					{if $item.id}ID:{$item.id}{else}<span class="red">无关</span>{/if}
				</td>
				<td>
					<a href="images/{$item.name}">[{$lang.view}]</a>
					{if not $item.id}<a onClick="del_file('images/{$item.name}')">[{$lang.delete}]</a>{/if}
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<div class="space"></div>
{foreach from=$lists name=lists item=type}
<div class="block">
	<div class="head"><span>频道图片 - {$type.name}</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>图片目录</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$type.folder name=list item=item}
			<tr>
				<td>images/{$type.channel}/{$item.name}</td>
				<td>
					<a href="{url channel='file' mod='pic_list' path=$item.path_str}">[进入查看]</a>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<div class="space"></div>
{/foreach}
<div class="block">
	<div class="head"><span>编辑器图片</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>图片目录</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$list_editor name=list_editor item=item}
			<tr>
				<td>images/editor/{$item.name}</td>
				<td>
					<a href="{url channel='file' mod='pic_list' path=$item.path_str}">[进入查看]</a>
				</td>
			</tr>
			{/foreach}
		</table>
	</div>
</div>
<iframe class="deal" name="deal"></iframe>
