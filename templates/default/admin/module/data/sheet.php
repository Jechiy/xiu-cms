{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>{$lang.article_sheet}</span></div>
	<div class="main">
		<div class="gather_cat_bt">
			{foreach from=$cat_list name=cat_list item=item}
			<a href="{url channel='data' mod='sheet' cat=$item.server_id}">{$item.server_name}</a>&nbsp;&nbsp;
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
		1、免费会员每天只能采集5条数据，付费会员每天可采集100条数据；<br />
		2、采集之前先在“采集设置”处设置采集帐号和对应分类。
	</div>
</div>
{literal}
<script language="javascript">
	function do_gather(id)
	{
		document.getElementById("checkbox_" + id).innerHTML = "采集中";
		ajax("post","?/deal/","cmd=do_gather&id=" + id,
		function(data)
		{
			if(data == 1)
			{
				document.getElementById("checkbox_" + id).innerHTML = "已采集";
			}else if(data == 2){
				alert("请先设置分类");
			}else if(data == 3){
				alert("请先设置采集帐号");
			}else if(data == 4){
				alert("采集帐号有误");
			}else if(data == 5){
				alert("普通会员每天只能采集5条数据");
			}else if(data == 6){
				alert("您好，尊贵的高级会员！您今天已经采集了100条数据。");
			}else if(data == 7){
				alert("同一IP每天只能使用一个帐号，如有疑问，请联系新秀客服");	
			}
		});
	}
</script>
{/literal}