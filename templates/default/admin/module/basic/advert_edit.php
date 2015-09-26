{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>编辑广告</span></div>
	<div class="main">
		<form id="form_edit_advert" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="add_or_edit_advert" />
			<input name="adv_id" type="hidden" value="{$advert.adv_id}" />
			<table class="table">
				<tr>
					<td>广告名称：</td>
					<td><input name="adv_name" type="text" class="text" maxlength="40" value="{$advert.adv_name}" /></td>
				</tr>
				<tr>
					<td>广告代码：</td>
					<td><textarea class="textarea" name="adv_code">{$advert.adv_code}</textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
							<input class="button" type="button" onclick="go_back()" value="{$lang.go_back}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>