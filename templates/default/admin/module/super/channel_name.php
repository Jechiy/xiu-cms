{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>频道名称</span></div>
	<div class="main">
		<form id="edit_channel_name" method="post" action="{url channel=$global.channel}">
		<input name="cmd" type="hidden" value="edit_channel_name" />
		<table class="table sheet">
			<tr class="h">
				<td>字符名</td>
				<td>名称</td>
			</tr>
			{foreach from=$channel name=channel item=item}
			<tr>
				<td><input name="cha_id[]" type="hidden" value="{$item.cha_id}" />{$item.cha_code}</td>
				<td><input name="cha_name[]" type="text" class="text" maxlength="50" value="{$item.cha_name}" /></td>
			</tr>
			{/foreach}
			<tr>
				<td class="bt_row" colspan="4">
					<div class="bt_row">
						<input class="button" type="submit" value="{$lang.edit}" />
					</div>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>