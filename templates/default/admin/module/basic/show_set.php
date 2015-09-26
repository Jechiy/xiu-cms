{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>模块启闭</span></div>
	<div class="main">
		<table class="table">
			{foreach from=$show name=show item=item}
			{if $smarty.foreach.show.index mod 2 == 0}<tr>{/if}
			<td width="15%">{$item.name}：</td>
			<td width="35%">
			<input type="radio" name="{$item.text}" id="{$item.text}-1" {$item.yes} onclick="edit_show(this.id)" />开启
			<input type="radio" name="{$item.text}" id="{$item.text}-0" {$item.no} onclick="edit_show(this.id)" />{$lang.close}</td>
			{if $smarty.foreach.show.index mod 2 == 1}
			</tr>
			{elseif $smarty.foreach.show.last}
			<td width="15%">&nbsp;</td>
			<td width="35%">&nbsp;</td>
			</tr>
			{/if}
			{/foreach}
		</table>
	</div>
</div>
{literal}
<script language="javascript">
	function edit_show(id)
	{
		ajax("post","?/deal/dir-basic/","cmd=edit_show&id="+id,
		function(data)
		{
			if(data == 1) result();
		});
	}
</script>
{/literal}