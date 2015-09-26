<?php
class link extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'link');
		$this->set_where("lin_lang = '".S_LANG."'");
		$this->set_order('lin_top');
		$this->set_order('lin_index');
		$this->set_order('lin_id');
	}
}
//新秀
?>