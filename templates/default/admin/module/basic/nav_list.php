{*<?php exit();?>*}
{foreach from=$nav name=nav item=cat}
<div class="block">
	<div class="head"><span>导航管理 - {$cat.name}</span></div>
	<div class="main">
		<form id="form_edit_nav_{$cat.type}" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_nav" />
			<table class="table sheet">
				<tr class="h">
					<td>文字</td>
					<td>链接</td>
					<td width="45px">{$lang.set_index}</td>
					<td width="40px">{$lang.set_top}</td>
					<td width="40px">{$lang.set_show}</td>
					<td>{$lang.operate}</td>
				</tr>
				{foreach from=$list[$cat.type] name=list item=item}
				<tr>
					<td><input name="word[]" type="text" class="text" maxlength="50" value="{$item.men_name}" /></td>
					<td><input name="link[]" type="text" class="text" maxlength="150" value="{$item.men_url}" /></td>
					<td onClick="show_edit('index_{$item.men_id}')">
						<span id="index_{$item.men_id}_1">{$item.men_index}<img src="{$S_TPL_PATH}images/pencil.gif" /></span>
						<span id="index_{$item.men_id}_2" style="display:none;">
							<input type="text" id="index_{$item.men_id}" value="{$item.men_index}" style="width:30px;" onBlur="set_order('index','menu',{$item.men_id},this.value)" />
						</span>
					</td>
					<td><input type="checkbox" {if $item.men_top == 1}checked{/if} onClick="set_order('top','menu',{$item.men_id},this.checked)" /></td>
					<td><input type="checkbox" {if $item.men_show == 1}checked{/if} onClick="set_order('show','menu',{$item.men_id},this.checked)" /></td>
					<td><input name="id[]" type="hidden" value="{$item.men_id}" /><span class="red" onClick="del('menu|{$item.men_id}')">[{$lang.delete}]</span></td>
				</tr>
				{/foreach}
				<tr>
					<td colspan="6">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
							<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='nav_add' type=$cat.type}')" value="{$lang.add}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
{if !$smarty.foreach.nav.last}<div class="space"></div>{/if}
{/foreach}
