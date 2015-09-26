{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.article_sheet}</span></div>
	<div class="main">
		<div class="gather_cat_bt">
			{foreach from=$cat_list name=cat_list item=item}
			<a href="{url channel='data' mod='tailor_sheet' cat=$item.server_id}">{$item.server_name}</a>&nbsp;&nbsp;
			{/foreach}
		</div>
		<table class="table sheet">
			<tr class="h">
				<td width="150px">{$lang.category}</td>
				<td>{$lang.title}</td>
				<td width="150px">时间</td>
				<td width="100px">采集</td>
			</tr>
			{foreach from=$article name=article item=item}
			<tr>
				<td>{if $item.cat_name}{$item.cat_name}{else}{$lang.none}{/if}</td>
				<td>{$item.art_title}</td>
				<td>{$item.art_add_time|date_format:"%Y-%m-%d %H:%M:%S"}</td>
				<td>
					{if $item.is_exist != 1}
					<span id="checkbox_{$item.art_id}"><input type="checkbox" onClick="do_gather({$item.art_id})" /></span>
					{else}已采集{/if}
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="7">
					{include file="module/page_link.php" page=$global.page}
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		1、本功能仅供新秀高级会员使用；<br />
		2、采集之前先在“采集设置”处设置采集帐号，在“私人定制”处设置对应分类。
	</div>
</div>
{literal}
<script language="javascript">
	function do_gather(id)
	{
		document.getElementById("checkbox_" + id).innerHTML = "采集中";
		ajax("post","?/deal/","cmd=do_gather_tailor&id=" + id,
		function(data)
		{
			if(data == 1)
			{
				document.getElementById("checkbox_" + id).innerHTML = "已采集";
			}else if(data == 2){
				alert("请先设置分类");
			}else if(data == 'lack_of_user_name_and_password'){
				alert("请先设置采集帐号");
			}else if(data == 'account_information_is_incorrect'){
				alert("采集帐号有误");
			}else if(data == 'not_senior_members'){
				alert("您不是高级会员");
			}else if(data == 'suspected_unauthorized'){
				alert("涉嫌越权采集");	
			}
		});
	}
</script>
{/literal}