<?php
class cat_art extends category
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'cat_art');
		$this->set_where("cat_lang = '".S_LANG."'");
		$this->set_order('cat_top');
		$this->set_order('cat_index');
		$this->set_order('cat_id','asc');
	}
}
//新秀
?>