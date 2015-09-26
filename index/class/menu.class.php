<?php
class menu extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'menu');
		$this->set_where("men_lang = '".S_LANG."'");
		$this->set_where('men_show = 1');
		$this->set_order('men_top');
		$this->set_order('men_index');
		$this->set_order('men_id','asc');
	}
	
	public function get_list()
	{
		$arr = parent::get_list();
		for($i = 0; $i < count($arr); $i ++)
		{
			if(substr($arr[$i]['men_url'],0,5) != 'http:')
			{
				$arr[$i]['target'] = 0;
			}else{
				$arr[$i]['target'] = 1;
			}
		}
		return $arr;
	}
	
	protected function deal($field,$val)
	{
		if($field == 'men_url' && substr($val,0,5) != 'http:' && substr($val,0,2) != './')
		{
			$val = S_ROOT . S_URL_PREFIX . $val;
		}elseif(substr($val,0,2) == './'){
			$val = S_ROOT . substr($val,2);
		}
		return $val;
	}
	
}
//新秀
?>