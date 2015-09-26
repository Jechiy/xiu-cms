<?php
class advert extends table
{
	public function __construct()
	{
		parent::__construct();
		$this->set_table(S_DB_PREFIX.'advert');
	}
}
//新秀
?>