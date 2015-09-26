<?php
class varia extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'varia');
		$this->set_where("(var_lang = 'none' or var_lang = '".S_LANG."')");
	}
	
	public function get_value($val,$is_text = false)
	{
		$this->set_where('');
		$this->set_where("(var_lang = 'none' or var_lang = '".S_LANG."')");
		$this->set_where("var_name = '$val'");
		$one = $this->get_one();
		if(count($one) > 0)
		{
			if(!$is_text)
			{
				return $one['var_value'];
			}else{
				return $one['var_text'];
			}
		}else{
			return false;
		}
	}
	
	public function add_var_value($name,$val,$lang = '',$is_text = false)
	{
		$this->clear_value();
		$this->set_value('var_name',$name);
		if(!$is_text)
		{
			$this->set_value('var_value',$val);
		}else{
			$this->set_value('var_text',$val);
		}
		if($lang != '')
		{
			$this->set_value('var_lang',$lang);
		}
		$this->add();
	}
	
	public function edit_var_value($name,$val,$is_text = false)
	{
		$this->clear_value();
		if(!$is_text)
		{
			$this->set_value('var_value',$val);
		}else{
			$this->set_value('var_text',$val);
		}
		$this->set_where('');
		$this->set_where("(var_lang = 'none' or var_lang = '".S_LANG."')");
		$this->set_where("var_name = '$name'");
		$this->edit();
	}
}
//新秀
?>