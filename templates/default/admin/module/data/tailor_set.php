{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>私有数据分类设置</span></div>
	<div class="main">
		<form id="form_edit_tailor_cat" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_tailor_cat" />
			<table class="table sheet">
				<tr class="h">
					<td width="30%">官方分类</td>
					<td>对应本地频道</td>
					<td>对应本地分类</td>
					<td>{$lang.operate}</td>
				</tr>
				{foreach from=$cat_setting name=cat_setting item=setting}
				{$server_id = $setting.server_id}
				<tr>
					<td>{$setting.server_name}</td>
					<td>
						<input name="varia_id[]" type="hidden" value="{$setting.varia_id}" />
						<select name="data_channel[]" onchange="get_channel_cat(this.value,'tag_{$server_id}')">
							<option value="0">{$lang.please_select}</option>
							{foreach from=$channel name=channel item=item}
							<option value="{$item.cha_id}" {if $item.cha_id == $setting.channel_id}selected="selected"{/if}>{$item.cha_name}</option>
							{/foreach}
						</select>
					</td>
					<td>
						<div id="tag_{$server_id}">
						<select name="data_cat[]">
							<option value="0">{$lang.please_select}</option>
							{foreach from=$cat_list[$server_id] name=cat_list item=item}
							<option value="{$item.cat_id}" {if $item.cat_id == $setting.cat_id}selected="selected"{/if}>{section name=loop loop=$item.grade - 1}&nbsp;{/section}{$item.cat_name}</option>
							{/foreach}
						</select>
						</div>
					</td>
					<td><span class="red" onClick="del('varia|{$setting.varia_id}')">[{$lang.delete}]</span></td>
				</tr>
				{/foreach}
				<tr>
					<td colspan="4">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
							<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='tailor_cat_add'}')" value="{$lang.add}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		1、本功能仅供新秀高级会员使用；<br />
		2、使用本功能可以采集任意类型的数据，你可以任意指定目标采集网站或者数据类别，每天采集数量不限；<br />
		3、“官方分类ID”和“官方分类名称”两项，请在成为新秀高级会员之后联系新秀客服获取。
	</div>
</div>