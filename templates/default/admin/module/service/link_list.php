{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>友情链接</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>文字</td>
				<td>网址</td>
				<td>图片</td>
				<td>描述</td>
				<td width="45px">{$lang.set_index}</td>
				<td width="40px">{$lang.set_top}</td>
				<td width="40px">{$lang.set_show}</td>
				<td width="100px">{$lang.operate}</td>
			</tr>
			{foreach from=$link name=link item=item}
			<tr>
				<td>{$item.lin_word}</td>
				<td>{$item.lin_url}</td>
				<td>{if $item.lin_img != 'none'}<img class="lin_img" src="{$item.lin_img}" width="88px" height="31px" />{else}{$item.lin_img}{/if}</td>
				<td>{$item.lin_title}</td>
				<td onClick="show_edit('index_{$item.lin_id}')">
					<span id="index_{$item.lin_id}_1">{$item.lin_index}<img src="{$S_TPL_PATH}images/pencil.gif" /></span>
					<span id="index_{$item.lin_id}_2" style="display:none;">
						<input type="text" id="index_{$item.lin_id}" value="{$item.lin_index}" style="width:30px;" onBlur="set_order('index','link',{$item.lin_id},this.value)" />
					</span>
				</td>
				<td><input type="checkbox" {if $item.lin_top == 1}checked{/if} onClick="set_order('top','link',{$item.lin_id},this.checked)" /></td>
				<td>{if $item.lin_lock}-{else}<input type="checkbox" {if $item.lin_show == 1}checked{/if} onClick="set_order('show','link',{$item.lin_id},this.checked)" />{/if}</td>
				<td>
					{if $item.lin_lock}
					<span class="red">[赞助商链接]</span>
					{else}
					<a onClick="jump('{url channel=$global.channel mod='link_edit' id=$item.lin_id}')">[{$lang.edit}]</a>
					<a onClick="del('link|{$item.lin_id}')">[{$lang.delete}]</a>
					{/if}
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="8">
					<div class="bt_row">
						<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='link_add'}')" value="{$lang.add}" />
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		1、我方建议保留赞助商链接，因此此处不提供赞助商链接删除功能，若非要删除赞助商链接，请到数据库中删除。
	</div>
</div>