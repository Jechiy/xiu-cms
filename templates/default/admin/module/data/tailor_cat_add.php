{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>添加私有分类</span></div>
	<div class="main">
		<form id="form_add_tailor_cat" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_tailor_cat" />
			<table class="table">
				<tr>
					<td>官方分类ID：</td>
					<td><input name="server_id" type="text" class="text" maxlength="50" /></td>
				</tr>
				<tr>
					<td>官方分类名称：</td>
					<td><input name="server_name" type="text" class="text" maxlength="50" /></td>
				</tr>
				<tr>
					<td>本地对应频道：</td>
					<td>
						<select name="data_channel" onchange="get_channel_cat(this.value,'cat_tag')">
							<option value="0">{$lang.please_select}</option>
							{foreach from=$channel name=channel item=item}
							<option value="{$item.cha_id}">{$item.cha_name}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<td>本地对应分类：</td>
					<td>
						<div id="cat_tag">
						<select name="data_cat">
							<option value="0">{$lang.please_select}</option>
							{foreach from=$cat_list name=cat_list item=item}
							<option value="{$item.cat_id}">{section name=loop loop=$item.grade - 1}&nbsp;{/section}{$item.cat_name}</option>
							{/foreach}
						</select>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.submit}" />
							<input class="button" type="button" onclick="go_back()" value="{$lang.go_back}" />
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
		2、“官方分类ID”和“官方分类名称”两项，请在成为新秀高级会员之后联系新秀客服获取。
	</div>
</div>
