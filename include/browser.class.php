<?php
class browser
{
	public function check_browser()
	{
		$touch_browser_list = array('iphone','android','phone','mobile','wap','netfront','java','opera mobi','opera mini','ucweb','windows ce','symbian','series','webos','sony','blackberry','dopod','nokia','samsung','palmsource','xda','pieplus','meizu','midp','cldc','motorola','foma','docomo','up.browser','up.link','blazer','helio','hosin','huawei','novarra','coolpad','webos','techfaith','palmsource','alcatel','amoi','ktouch','nexian','ericsson','philips','sagem','wellcom','bunjalloo','maui','smartphone','iemobile','spice','bird','zte-','longcos','pantech','gionee','portalmmm','jig browser','hiptop','benq','haier','^lct','320x320','240x320','176x220');
		$mobile_browser_list = array('windows phone');
		$wml_browser_list = array('cect','compal','ctl','lg','nec','tcl','alcatel','ericsson','bird','daxian','dbtel','eastcom','pantech','dopod','philips','haier','konka','kejian','lenovo','benq','mot','soutec','nokia','sagem','sgh','sed','capitel','panasonic','sonyericsson','sharp','amoi','panda','zte');
		$pad_list = array('pad','gt-p1000');
		$user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
		
		if($this->dstrpos($user_agent,$pad_list))
		{
			return 'unknown';
		}
		if(($val = $this->dstrpos($user_agent,$touch_browser_list,true)))
		{
			return 'touch_browser';
		}
		if(($val = $this->dstrpos($user_agent,$mobile_browser_list,true)))
		{
			return 'mobile_browser';
		}
		if(($val = $this->dstrpos($user_agent,$wml_browser_list)))
		{
			return 'wml_browser';
		}
		$brower = array('mozilla','chrome','safari','opera','m3gate','winwap','openwave','myop');
		if($this->dstrpos($user_agent,$brower))
		{
			return 'pc';
		}
		return 'unknown';
	}
	public function dstrpos($str,$arr,$return = false)
	{
		if(empty($str))
		{
			return false;
		}
		foreach((array)$arr as $value)
		{
			if(strpos($str,$value) !== false)
			{
				$result = $return ? $value : true;
				return $result;
			}
		}
		return false;
	}
}
//新秀
?>