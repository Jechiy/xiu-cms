{*<?php exit();?>*}
<div class="page_link">
	<div class="inner">
		<div class="inner_2">
			{if $page_sum != 1}
			<a href="{url prefix=$prefix page=1}">首页</a>
			{if $page-1 > 0}<a href="{url prefix=$prefix page=$page-1}">上一页</a>{/if}
			{if $page-4 > 0}<a class="num" href="{url prefix=$prefix page=$page-4}">{$page-4}</a>{/if}
			{if $page-3 > 0}<a class="num" href="{url prefix=$prefix page=$page-3}">{$page-3}</a>{/if}
			{if $page-2 > 0}<a class="num" href="{url prefix=$prefix page=$page-2}">{$page-2}</a>{/if}
			{if $page-1 > 0}<a class="num" href="{url prefix=$prefix page=$page-1}">{$page-1}</a>{/if}
			<a class="on" href="{url prefix=$prefix page=$page}">{$page}</a>
			{if $page+1 <= $page_sum}<a class="num" href="{url prefix=$prefix page=$page+1}">{$page+1}</a>{/if}
			{if $page+2 <= $page_sum}<a class="num" href="{url prefix=$prefix page=$page+2}">{$page+2}</a>{/if}
			{if $page+3 <= $page_sum}<a class="num" href="{url prefix=$prefix page=$page+3}">{$page+3}</a>{/if}
			{if $page+4 <= $page_sum}<a class="num" href="{url prefix=$prefix page=$page+4}">{$page+4}</a>{/if}
			{if $page+1 <= $page_sum}<a href="{url prefix=$prefix page=$page+1}">下一页</a>{/if}
			<a href="{url prefix=$prefix page=$page_sum}">末页</a>
			{/if}
		</div>
	</div>
	<div class="clear"></div>
</div>
<!-- 新秀 -->