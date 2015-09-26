{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.article_cat}</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>{$lang.parent_cat}</td>
				<td>{$lang.cat_name}</td>
				<td width="30px">{$lang.grade}</td>
				<td width="45px">{$lang.set_index}</td>
				<td width="40px">{$lang.set_best}</td>
				<td width="40px">{$lang.set_top}</td>
				<td width="40px">{$lang.set_show}</td>
				<td width="80px">{$lang.operate}</td>
			</tr>
			{foreach from=$cat_list name=cat_list item=item}
			<tr>
				<td>{if $item.parent_name}{$item.parent_name}{else}{$lang.none}{/if}</td>
				<td>{$item.cat_name}</td>
				<td>{$item.grade}</td>
				<td style="text-align:center" onClick="show_edit('index_{$item.cat_id}')">
					<span id="index_{$item.cat_id}_1">{$item.cat_index}<img src="{$S_TPL_PATH}images/pencil.gif" /></span>
					<span id="index_{$item.cat_id}_2" style="display:none;">
						<input type="text" id="index_{$item.cat_id}" value="{$item.cat_index}" style="width:30px;" onBlur="set_order('index','cat_art',{$item.cat_id},this.value)" />
					</span>
				</td>
				<td style="text-align:center"><input type="checkbox" {if $item.cat_best == 1}checked{/if} onClick="set_order('best','cat_art',{$item.cat_id},this.checked)" /></td>
				<td style="text-align:center"><input type="checkbox" {if $item.cat_top == 1}checked{/if} onClick="set_order('top','cat_art',{$item.cat_id},this.checked)" /></td>
				<td style="text-align:center"><input type="checkbox" {if $item.cat_show == 1}checked{/if} onClick="set_order('show','cat_art',{$item.cat_id},this.checked)" /></td>
				<td>
					<a href="{url channel=$global.channel mod='cat_edit' id=$item.cat_id}">[{$lang.edit}]</a>&nbsp;
					{if $item.exist_child == 0}
					<a onClick="del('cat_art|{$item.cat_id}')">[{$lang.delete}]</a>
					{else}
					<a onClick="no_deal()">[{$lang.delete}]</a>
					{/if}
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="8">
					<div class="bt_row">
						<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='cat_add'}')" value="{$lang.add}" />
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<script language="javascript">
	var lang_failed = "{$lang.failed}";
</script>
{literal}
<script language="javascript">
	function no_deal()
	{
		alert(lang_failed);
	}
</script>
{/literal}