{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>网站设置</span></div>
	<div class="main">
		<form id="form_edit_site" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_site" />
			<table class="table">
				<tr>
					<td>网站标题：</td>
					<td><input name="site_title" type="text" class="text" maxlength="200" value="{$site.title}" /></td>
				</tr>
				<tr>
					<td>企业名称：</td>
					<td><input name="site_name" type="text" class="text" maxlength="200" value="{$site.name}" /></td>
				</tr>
				<tr>
					<td>网站域名：</td>
					<td><input name="site_domain" type="text" class="text" maxlength="200" value="{$site.domain}" /></td>
				</tr>
				<tr>
					<td>ICP备案号：</td>
					<td><input name="site_record" type="text" class="text" maxlength="200" value="{$site.record}" /></td>
				</tr>
				<tr>
					<td>备案号链接：</td>
					<td><input name="site_record_url" type="text" class="text" maxlength="200" value="{$site.record_url}" /></td>
				</tr>
				<tr>
					<td>技术支持：</td>
					<td><input name="site_tech" type="text" class="text" maxlength="200" value="{$site.tech}" /></td>
				</tr>
				<tr>
					<td>技术支持链接：</td>
					<td><input name="site_tech_url" type="text" class="text" maxlength="200" value="{$site.tech_url}" /></td>
				</tr>
				<tr>
					<td>网站关键字：</td>
					<td><input name="site_keywords" type="text" class="text" maxlength="200" value="{$site.keywords}" /></td>
				</tr>
				<tr>
					<td>网站描述：</td>
					<td><textarea class="textarea" name="site_description">{$site.description}</textarea></td>
				</tr>
				<tr>
					<td>统计代码：</td>
					<td>
						<textarea class="textarea" name="statistical_code">{$site.statistical_code}</textarea><br />
						<div class="sentence">
							可到&nbsp;<a href="http://www.cnzz.com/" target="_blank">http://www.cnzz.com/</a>&nbsp;获取统计代码
						</div>
					</td>
				</tr>
				<tr>
					<td>分享代码：</td>
					<td>
						<textarea class="textarea" name="share_code">{$site.share_code}</textarea><br />
						<div class="sentence">
							可到&nbsp;<a href="http://www.jiathis.com/" target="_blank">http://www.jiathis.com/</a>&nbsp;获取分享代码
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.edit}" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
