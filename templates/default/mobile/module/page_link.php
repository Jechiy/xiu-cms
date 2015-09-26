{*<?php exit();?>*}
<div class="page_link">
	<div class="inner">
		<div class="inner_2">
			{if $page_sum != 1}
			{if $page-1 > 0}<a href="{url prefix=$prefix page=$page-1}">上一页</a>{/if}
			{if $page-1 > 0}<a class="num" href="{url prefix=$prefix page=$page-1}">{$page-1}</a>{/if}
			<a class="on" href="{url prefix=$prefix page=$page}">{$page}</a>
			{if $page+1 <= $page_sum}<a class="num" href="{url prefix=$prefix page=$page+1}">{$page+1}</a>{/if}
			{if $page+1 <= $page_sum}<a href="{url prefix=$prefix page=$page+1}">下一页</a>{/if}
			{/if}
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- 新秀 -->