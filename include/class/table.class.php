<?php
class table
{
	protected $db;
	protected $table;
	protected $field;
	protected $where;
	protected $order;
	protected $data = array();
	protected $value = array();
	protected $page_size;
	protected $page;
	protected $page_sum;
	
	//构造函数
	public function __construct()
	{
		$this->db = database::get_instance();
		$this->table = '';
		$this->field = '*';
		$this->where = '';
		$this->order = '';
		$this->page_size = 0;
		$this->page = 1;
		$this->page_sum = 1;
	}
	
	//析构函数
	public function __destruct()
	{
		
	}
	
	//////////////////////// public方法 ////////////////////////
	
	//设置表名
	public function set_table($val)
	{
		if($val != '')
		{
			if($this->table == '')
			{
				$this->table = $val;
			}else{
				$this->table .= ',' . $val;
			}
		}else{
			$this->table = '';
		}
	}
	
	//设置字段名
	public function set_field($val)
	{
		if($val != '' && $val != '*')
		{
			if($this->field == '*')
			{
				$this->field = $val;
			}else{
				$this->field .= ',' . $val;
			}
		}else{
			$this->field = '*';
		}
	}
	
	//设置查询条件
	public function set_where($val,$logic = 'and')
	{
		if($val != '')
		{
			if($this->where == '')
			{
				$this->where = ' where ' . $val . ' ';
			}else{
				$this->where .= ' ' . $logic . ' ' . $val . ' ';
			}
		}else{
			$this->where = '';
		}
	}
	
	//设置排序
	public function set_order($val,$by = 'desc')
	{
		if($val != '')
		{
			$str = ' order by ';
			if($this->order == '')
			{
				$this->order = $str . "$val $by";
			}else{
				$this->order .= ",$val $by";
			}
		}else{
			$this->order = '';
		}
	}
	
	//设置字段值
	public function set_value($filed,$val)
	{
		$this->value[$filed] = $val;
	}
	
	//清除字段值
	public function clear_value()
	{
		$this->value = array();
	}
	
	//添加数据
	public function add()
	{
		$arr = $this->value;
		if(count($arr))
		{
			$fields = implode(',',array_keys($arr));
			foreach($arr as $key => $value)
			{
				$arr[$key] = "'" . $value . "'";
			}
			$values = implode(',',$arr);
			$sql = "insert into " . $this->table . " ($fields) values ($values)";
			$this->db->sql_query($sql);
			return true;
		}else{
			return false;
		}
	}
	
	//修改数据
	public function edit()
	{
		$arr = $this->value;
		if(count($arr))
		{
			foreach($arr as $key => $value)
			{
				$arr[$key] = "$key = '" . $value . "'";
			}
			$str = implode(',',$arr);
			$sql = "update " . $this->table . " set $str " . $this->where;
			$this->db->sql_query($sql);
			return true;
		}else{
			return false;
		}
	}
	
	//删除数据
	public function del()
	{
		$sql = "delete from " . $this->table . $this->where;
		$this->db->sql_query($sql);
	}
	
	//获取数据行数
	public function get_count()
	{
		$this->set_order('');
		$this->db->sql_query($this->get_sql());
		return $this->db->get_record_count();
	}
	
	//获取一条数据
	public function get_one()
	{
		$this->db->set_limit(1);
		$this->db->sql_query($this->get_sql());
		if($this->db->get_record_count() > 0)
		{
			if($this->field != '*')
			{
				$arr = explode(',',$this->field);
			}else{
				$arr = explode(',',$this->db->get_all_fields());
			}
			for($i = 0; $i < count($arr); $i ++)
			{
				$field = $arr[$i];
				$this->data[$field] = $this->deal($field,$this->db->sql_result(0,$field));
			}
		}
		return $this->data;
	}
	
	//获取不翻页列表
	public function get_list()
	{
		$this->db->set_limit($this->page_size);
		$this->db->sql_query($this->get_sql());
		$record_count = $this->db->get_record_count();
		if($record_count > 0)
		{
			if(!$this->page_size || $record_count < $this->page_size)
			{
				$this->page_size = $record_count;
			}
			if($this->field != '*')
			{
				$arr = explode(',',$this->field);
			}else{
				$arr = explode(',',$this->db->get_all_fields());
			}
			for($i = 0; $i < $this->page_size; $i ++)
			{
				for($j = 0; $j < count($arr); $j ++)
				{
					$field = $arr[$j];
					$this->data[$i][$field] = $this->deal($field,$this->db->sql_result($i,$field));
				}
			}
		}
		return $this->data;
	}
	
	//获取不翻页列表
	public function get_sheet()
	{
		$this->db->sql_query($this->get_sql());
		$record_count = $this->db->get_record_count();
		if($record_count > 0)
		{
			$this->db->set_page_size($this->page_size);
			if($record_count % $this->page_size > 0)
			{
				$this->page_sum = intval($record_count / $this->page_size) + 1;
			}else{
				$this->page_sum = intval($record_count / $this->page_size);
			}
			$this->page = num_bound(1,$this->page_sum,$this->page);
			$this->db->set_absolute_page($this->page);
			$record_count = $record_count - ($this->page - 1) * $this->page_size;
			if(!$this->page_size || $record_count < $this->page_size)
			{
				$this->page_size = $record_count;
			}
			$this->db->set_real_page_size($this->page_size);
			if($this->field != '*')
			{
				$arr = explode(',',$this->field);
			}else{
				$arr = explode(',',$this->db->get_all_fields());
			}
			for($i = 0; $i < $this->page_size; $i ++)
			{
				for($j = 0; $j < count($arr); $j ++)
				{
					$field = $arr[$j];
					$this->data[$i][$field] = $this->deal($field,$this->db->sql_result($i,$field));
				}
			}
		}else{
			$this->page_size = 0;
		}
		return $this->data;
	}
	
	//设置页面记录数
	public function set_page_size($val)
	{
		$this->page_size = $val;
	}
	
	//设置当前页数
	public function set_page_num($val)
	{
		$this->page = $val;
	}
	
	 //获取总页数
	public function get_page_sum()
	{
		return $this->page_sum;
	}
	
	//////////////////////// protected方法 ////////////////////////
	
	protected function get_sql()
	{
		$sql = 'select ';
		$sql .= $this->field;
		$sql .= ' from ';
		$sql .= $this->table;
		$sql .= $this->where;
		$sql .= $this->order;
		return $sql;
	}
	
	protected function deal($field,$val)
	{
		return $val;
	}
}
//新秀
?>