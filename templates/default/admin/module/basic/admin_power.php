{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>权限设置 - {$admin.adm_username}</span></div>
	<div class="main">
		<form id="form_admin_power" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="admin_power" />
			<input name="adm_id" type="hidden" value="{$global.id}" />
			<table class="table">
				<tr>
					{foreach from=$power name=power item=item}
					<td width="100px">{$item.name}：</td>
					<td>
						<input name="url[]" type="checkbox" {if $item.set}checked="checked"{/if} value="{$item.url}" />
					</td>
					{if $smarty.foreach.power.last}
						{if $smarty.foreach.power.index mod 4 == 0}
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						{elseif $smarty.foreach.power.index mod 4 == 1}
							<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
						{elseif $smarty.foreach.power.index mod 4 == 2}
							<td>&nbsp;</td><td>&nbsp;</td>
						{/if}
					{/if}
					{if !$smarty.foreach.power.last && $smarty.foreach.power.index mod 4 == 3}</tr><tr>{/if}
					{/foreach}
				</tr>
				<tr>
					<td colspan="8">
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