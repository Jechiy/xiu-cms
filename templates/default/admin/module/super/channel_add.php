{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>新建频道</span></div>
	<div class="main">
		<form id="form_add_channel" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_channel" />
			<table class="table">
				<tr>
					<td colspan="2">请选择您所要创建的类似频道：</td>
				</tr>
				<tr>
					<td colspan="2">
						{foreach from=$original name=original item=item}
						<input name="original" type="radio" value="{$item.cha_code}" checked="checked" />{$item.cha_name} &nbsp;&nbsp;
						{/foreach}
					</td>
				</tr>
				<tr>
					<td width="100px">新频道代号：</td>
					<td><input name="cha_code" type="text" class="text" maxlength="50" />&nbsp;例如：cases</td>
				</tr>
				<tr>
					<td>新频道名称：</td>
					<td><input name="cha_name" type="text" class="text" maxlength="50" />&nbsp;例如：成功案例</td>
				</tr>
				<tr>
					<td>关键词替换：</td>
					<td>
						<input name="word_1" type="text" class="text2" maxlength="10" />&nbsp;&nbsp;替换为&nbsp;&nbsp;
						<input name="word_2" type="text" class="text2" maxlength="10" />&nbsp;例如将“文章”替换为“案例”
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.submit}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>已新建频道</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>频道代号</td>
				<td>频道名称</td>
				<td width="220px">语言包</td>
				<td>类似频道</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$channel name=channel item=item}
			<tr>
				<td>{$item.cha_code}</td>
				<td>{$item.cha_name}</td>
				<td>
					{$path = 'languages%2F'|cat:$S_LANG|cat:'%2Fadmin%2F'|cat:$item.cha_code|cat:'.txt'}
					<a href="{url channel='file' mod='lang_edit' path=$path}">admin/{$item.cha_code}.txt</a><br />
					{$path = 'languages%2F'|cat:$S_LANG|cat:'%2Findex%2F'|cat:$item.cha_code|cat:'.txt'}
					<a href="{url channel='file' mod='lang_edit' path=$path}">index/{$item.cha_code}.txt</a>
				</td>
				<td><a href="{$S_ROOT}{url channel=$item.original}" target="_blank">{$item.original}</a></td>
				<td>
					<a href="{$S_ROOT}{url channel=$item.cha_code}" target="_blank">[{$lang.view}]</a>
					<a onClick="del_channel({$item.cha_id})">[{$lang.delete}]</a>
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
		1、不能使用PHP保留字作为“新频道代号”，否则可能导致出错;<br />
		2、如果您使用了伪静态功能，创建新频道后，请在“静态设置”处重新开启伪静态。
	</div>
</div>
{literal}
<script language="javascript">
	function del_channel(val)
	{
		if(confirm("您确定要删除该帐号吗？"))
		{
			ajax("post","?/deal/dir-super/","cmd=del_channel&id=" + val,
			function(data)
			{
				if(data == 1) document.location.replace(document.location.href);
			});
		}
	}
</script>
{/literal}