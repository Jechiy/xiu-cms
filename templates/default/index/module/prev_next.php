{*<?php exit();?>*}
<div id="prev_next">
	<div class="prev">{$lang.prev}：{if $prev_title}<a href="{url prefix=$prefix id=$prev_id}">{$prev_title}</a>{else}{$lang.none}{/if}</div>
	<div class="next">{$lang.next}：{if $next_title}<a href="{url prefix=$prefix id=$next_id}">{$next_title}</a>{else}{$lang.none}{/if}</div>
	<div class="clear"></div>
</div>