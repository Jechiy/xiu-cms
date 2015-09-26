<?php
class menu extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'menu');
		$this->set_where("men_lang = '".S_LANG."'");
		$this->set_order('men_top');
		$this->set_order('men_index');
		$this->set_order('men_id','asc');
	}
}
//新秀
?>