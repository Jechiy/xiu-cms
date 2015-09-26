<?php
class admin extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'admin');
	}
}
//新秀
?>