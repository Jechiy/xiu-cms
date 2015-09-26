{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>帐号信息</span></div>
	<div class="main">
		<form id="form_edit_data_user" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_data_user" />
			<table class="table">
				<tr>
					<td colspan="2">注意：这里填写的是新秀采集帐号，而不是本网站后台管理员帐号。如果您还没有采集帐号，<a href="http://data.sinsiu.com/?/user/mod-register/index.html" target="_blank">请点击这里注册</a></td>
				</tr>
				<tr>
					<td width="30%">用户名：</td>
					<td>
						<input name="data_username" type="text" class="text" maxlength="200" value="{$data_username}" />
					</td>
				</tr>
				<tr>
					<td width="30%">密码：</td>
					<td>
						<input name="data_password" type="password" class="text" maxlength="200" value="{$data_password}" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>公共数据分类设置</span></div>
	<div class="main">
		<form id="form_edit_data_cat" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_data_cat" />
			<table class="table sheet">
				<tr class="h">
					<td width="30%">官方分类</td>
					<td>对应本地频道</td>
					<td>对应本地分类</td>
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
				</tr>
				{/foreach}
				<tr>
					<td colspan="3">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<!--
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		
	</div>
</div>
-->