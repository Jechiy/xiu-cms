{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>友情链接</span></div>
	<div class="main">
		<table class="table sheet">
			<tr class="h">
				<td>名称</td>
				<td width="250px">标签</td>
				<td width="120px">{$lang.operate}</td>
			</tr>
			{foreach from=$advert name=advert item=item}
			<tr>
				<td>{$item.adv_name}</td>
				<td>{ldelim}run module='ad' id='{$item.adv_id}'{rdelim}</td>
				<td>
					<a onClick="jump('{url channel=$global.channel mod='advert_edit' id=$item.adv_id}')">[{$lang.edit}]</a>
					<a onClick="del('advert|{$item.adv_id}')">[{$lang.delete}]</a>
				</td>
			</tr>
			{/foreach}
			<tr>
				<td colspan="3">
					<div class="bt_row">
						<input class="button" type="button" onClick="jump('{url channel=$global.channel mod='advert_add'}')" value="{$lang.add}" />
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
		1、系统原有三个广告建议只修改不删除，以免删除后不知道如何添加；<br />
		2、如果您不懂代码，在修改官方默认广告代码时，建议只把代码中间的中文替换成您的广告代码，保留首尾代码；<br />
		3、添加广告后复制标签插入到模板文件中，用户须要会点HTML基础。
	</div>
</div>