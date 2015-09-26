{*<?php exit();?>*}
<div class="block">
	<div class="head"><span>静态设置</span></div>
	<div class="main">
		<table class="table">
			<tr>
				<td width="30%">半静态：</td>
				<td>
					<input type="radio" name="half_static" onClick="set_static('half',1)" {if $S_HALF_STATIC == 1}checked{/if} />开启
					<input type="radio" name="half_static" onClick="set_static('half',0)" {if $S_HALF_STATIC == 0}checked{/if} />{$lang.close}</td>
			</tr>
			<tr>
				<td>伪静态：</td>
				<td>
					<input type="radio" name="sham_static" onClick="set_static('sham',1)" {if $S_SHAM_STATIC == 1}checked{/if} />开启
					<input type="radio" name="sham_static" onClick="set_static('sham',0)" {if $S_SHAM_STATIC == 0}checked{/if} />{$lang.close}</td>
			</tr>
			<tr>
				<td>发表内容时自动生成静态单页：</td>
				<td>
					<input type="radio" name="single_static" onClick="set_varia('single_page_static',1)" {if $single_page_static == 1}checked{/if} />开启
					<input type="radio" name="single_static" onClick="set_varia('single_page_static',0)" {if $single_page_static == 0}checked{/if} />{$lang.close}</td>
			</tr>
			<tr>
				<td>清除静态文件：</td>
				<td>
					<select id="clear_file_type">
						<option value="sheet">首页和列表页</option>
						<option value="all">所有页面</option>
					</select>
					<input class="button" type="button" onClick="clear_static()" value="立即清除" />
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="space"></div>
<div class="block">
	<div class="head"><span>{$lang.help}</span></div>
	<div class="main content">
		1、开启半静态模式之后，系统会自动把访问过的页面生成静态文件，后台每次更新之后，必须清除静态文件才能在前台显示更新内容。
	</div>
</div>
{literal}
<script language="javascript">
	function set_static(type,val)
	{
		ajax("post","?/deal/dir-basic/","cmd=set_"+type+"_static&val="+val,
		function(data)
		{
			if(data == 1) result();
		});
	}
	var create_static_interval;
	function create_static(val)
	{
		ajax("post","?/deal/dir-basic/","cmd=static_check",
		function(data)
		{
			if(data == 1)
			{
				set_create_static_cookie();
				document.getElementById("static_status").style.display = "block";
				create_static_interval = setInterval("create_static_ajax(" + val + ")",1500);			
			}else{
				alert("必须开启半静态才能生成页面，\n若要生成纯静态页面，\n必须同时开启半静态和纯静态");
			}
		});
	
	}
	function create_static_ajax(val)
	{
		ajax("post","?/deal/dir-basic/","cmd=create_static&val=" + val,
		function(data)
		{
			var step = get_cookie("create_static_step");
			var sum = Math.floor(get_cookie("create_static_sum"));
			var created = Math.floor(get_cookie("create_static_created"));
			if(step == "count"){
				document.getElementById("bar_sum").innerHTML = sum;
				if(val == 1)
				{
					document.cookie = "create_static_step=goods_sheet_page";
				}else{
					document.cookie = "create_static_step=goods_page";
				}
			}else{
				var bar_width = Math.floor(created / sum * 100) + "%";
				document.getElementById("bar_percent").innerHTML = bar_width;
				document.getElementById("bar_inside").style.width = bar_width;
				document.getElementById("bar_created").innerHTML = created;
			}
			if(step == "end")
			{
				document.getElementById("bar_percent").innerHTML = "100%";
				document.getElementById("bar_inside").style.width = "100%";
				set_create_static_cookie();
				clearInterval(create_static_interval);
				result();
			}
		});	
	}
	function set_create_static_cookie()
	{
		document.cookie = "create_static_step=count";
		document.cookie = "create_static_created=0";
		document.cookie = "create_static_id=0";
		document.cookie = "create_static_cat=0";
		document.cookie = "create_static_page=0";
	}
	function clear_static()
	{
		type = document.getElementById("clear_file_type").value;
		if(type != "")
		{
			ajax("post","?/deal/dir-basic/","cmd=clear_static&type=" + type,
			function(data)
			{
				if(data == 1) result();
			});
		}
	}
</script>
{/literal}