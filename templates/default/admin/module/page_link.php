{*<?php exit();?>*}
<div class="page_link">
	<div class="in">
		<span>共{$page_sum}页</span>
		<span>第{$page}页</span>
		{if $page_sum != 1}
		<a href="{url prefix=$prefix page=1}">首页</a>
		{if $page-1 > 0}<a href="{url prefix=$prefix page=$page-1}">上一页</a>{/if}
		{if $page-4 > 0}<a href="{url prefix=$prefix page=$page-4}">[{$page-4}]</a>{/if}
		{if $page-3 > 0}<a href="{url prefix=$prefix page=$page-3}">[{$page-3}]</a>{/if}
		{if $page-2 > 0}<a href="{url prefix=$prefix page=$page-2}">[{$page-2}]</a>{/if}
		{if $page-1 > 0}<a href="{url prefix=$prefix page=$page-1}">[{$page-1}]</a>{/if}
		<a href="{url prefix=$prefix page=$page}" style="color:#C00;font-weight:bold;">[{$page}]</a>
		{if $page+1 <= $page_sum}<a href="{url prefix=$prefix page=$page+1}">[{$page+1}]</a>{/if}
		{if $page+2 <= $page_sum}<a href="{url prefix=$prefix page=$page+2}">[{$page+2}]</a>{/if}
		{if $page+3 <= $page_sum}<a href="{url prefix=$prefix page=$page+3}">[{$page+3}]</a>{/if}
		{if $page+4 <= $page_sum}<a href="{url prefix=$prefix page=$page+4}">[{$page+4}]</a>{/if}
		{if $page+1 <= $page_sum}<a href="{url prefix=$prefix page=$page+1}">下一页</a>{/if}
		<a href="{url prefix=$prefix page=$page_sum}">末页</a>
		{/if}
		<form id="form_jump" action="" method="get">
			<input type="hidden" name="url" value="{url prefix=$prefix page=$page}" />
			<input class="text" type="text" style="width:30px" name="page" value="{$page}" />
			<input class="button" type="button" onclick="page_jump('{$page}')" value="跳转"/>
		</form>
	</div>
</div>
<!-- 新秀 -->