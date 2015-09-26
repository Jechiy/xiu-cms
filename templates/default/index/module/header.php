{*<?php exit();?>*}
<div id="header">
	<div class="top"></div>
	<div class="main">
		<div class="logo"><a href="./"><img src="{$S_ROOT}images/logo.png" /></a></div>
		{run module='ad' id='1'}
		<div class="links">
		  <a class="a_1" href="" onClick="window.external.addFavorite('http://'+window.location.host,'{$site_title}')" target="_top">收藏本站</a>
		  <a class="a_2" href="{url channel='message'}">在线留言</a>
		</div>
		<div class="search">
			<form id="form_search" method="post" action="{url entrance=$global.entrance channel='search'}">
				<input class="text" name="key" type="text" maxlength="30" onkeydown="if(event.keyCode == 13)do_search();" />
				<a class="bt" onclick="do_search()">{$lang.search}</a>
			</form>
		</div>
	</div>
</div>
<div id="nav">
	<ul>
		{foreach from=$nav name=nav item=item}
		<li><a href="{$item.men_url}" {if $item.target == 1}target="_blank"{/if}>{$item.men_name}</a></li>
		{/foreach}
		<div class="clear"></div>
	</ul>
</div>
{literal}
<script language="javascript">
	function do_search()
	{
		var obj = document.getElementById("form_search");
		var val = obj.key.value;
		obj.action = obj.action + "/key-" + val + "/";
		obj.submit();
	}
</script>
{/literal}
<!-- 新秀 -->
