{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>编辑语言文件 - {$file_path}</span></div>
	<div class="main">
		<form id="form_edit_lang" method="post" action="{url channel=$global.channel}">
			<input name="cmd" type="hidden" value="edit_lang" />
			<input name="path" type="hidden" value="{$file_path}" />
			<table class="table">
				<tr>
					<td>
						<textarea class="textarea" name="lang_text" style="width:806px;height:390px;">{$lang_text}</textarea>
					</td>
				</tr>
				<tr>
					<td>
						<div class="bt_row">
							<input class="button" type="submit" value="{$lang.submit}" />
							<input class="button" type="button" onclick="go_back()" value="返回" />
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
