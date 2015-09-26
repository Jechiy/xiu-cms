<?php
class channel extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'channel');
		$this->set_where("cha_lang = '".S_LANG."'");
		$this->set_order('cha_top');
		$this->set_order('cha_index');
		$this->set_order('cha_id','asc');
	}
}
//新秀
?>