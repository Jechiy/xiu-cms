<?php
class att_art extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'att_art');
		$this->set_where("att_lang = '".S_LANG."'");
		$this->set_order('att_top');
		$this->set_order('att_index');
		$this->set_order('att_id','asc');
	}
}
//新秀
?>