{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>安全设置</span></div>
	<div class="main">
		<table class="table">
			<tr>
				<td width="30%">后台登录设置：</td>
				<td>
					<input type="text" class="text2" onBlur="set_varia('safe_admin_login_hours',this.value)" value="{$safe_admin_login_hours}" />
					小时内同一IP只能登录后台
					<input type="text" class="text2" onBlur="set_varia('safe_admin_login_times',this.value)" value="{$safe_admin_login_times}" />
					次
				</td>
			</tr>
			<tr>
				<td>前台留言设置：</td>
				<td>
					<input type="text" class="text2" onBlur="set_varia('safe_message_hours',this.value)" value="{$safe_message_hours}" />
					小时内同一IP只能提交留言
					<input type="text" class="text2" onBlur="set_varia('safe_message_times',this.value)" value="{$safe_message_times}" />
					次
				</td>
			</tr>
			<tr>
				<td>前台评论设置：</td>
				<td>
					<input type="text" class="text2" onBlur="set_varia('safe_comment_hours',this.value)" value="{$safe_comment_hours}" />
					小时内同一IP只能提交评论
					<input type="text" class="text2" onBlur="set_varia('safe_comment_times',this.value)" value="{$safe_comment_times}" />
					次
				</td>
			</tr>
		</table>
	</div>
</div>
