<?php
class safe extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'safe');
	}
}
//新秀
?>