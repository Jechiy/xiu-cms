<?php
class category extends table
{
	public function __construct()
	{
		parent::__construct();
		
		$this->prefix = 'cat_';
	}
	
	public function get_tree()
	{
		$list = parent::get_list();
		if(count($arr))
		{
			return $this->set_cat_order($list);
		}else{
			return $list;
		}
	}
	
	public function set_prefix($val)
	{
		$this->prefix = $val;
	}
	
	//对分类进行排序，调用了get_tree_order()，并对其返回结果进行处理
	public function set_cat_order($list)
	{
		$arr1 = array();
		$arr2 = array();
		$return = array();
		$flag = 0;
		$list_len = count($list);
		for($i = 0; $i < $list_len; $i ++)
		{
			if($list[$i][$this->prefix.'parent_id'] != 0)
			{
				$flag = 1;
			}
		}
		if($list_len > 0 && $flag == 1)
		{
			for($i = 0; $i < $list_len; $i ++)
			{
				$arr1[$i] = $list[$i][$this->prefix.'id'];
				$arr2[$i] = $list[$i][$this->prefix.'parent_id'];
			}
			if($list_len > 0)
			{
				$tree_order = explode('{v}',$this->get_tree_order($arr1,$arr2));
				$arr3 = explode('|',$tree_order[0]);
				$arr4 = explode('|',$tree_order[1]);
				for($i = 1; $i < count($arr3) - 1; $i ++)
				{
					for($j = 0; $j < $list_len; $j ++)
					{
						if($list[$j][$this->prefix.'id'] == $arr3[$i])
						{
							foreach($list[$j] as $key => $value)
							{
								$return[$i - 1][$key] = $value;
							}
							$return[$i - 1]['grade'] = $arr4[$i];
						}
					}
				}
			}
		}elseif($list_len > 0 && $flag == 0){
			for($i = 0; $i < $list_len; $i ++)
			{
				foreach($list[$i] as $key => $value)
				{
					$return[$i][$key] = $value;
				}
				$return[$i]['grade'] = 1;
			}
		}
		return $return;
	}
	
	//对无序多级分类进行排序，返回一个记录排序信息的特殊字符串
	private function get_tree_order($id,$parent)
	{
		$j = 0;
		$k = count($parent);
		$id_str = array();
		$parent_str = array();
		$grade_str = '|';
		//将分类划分为不同等级
		while($k > 0)
		{
			$id_str[$j] = '|';
			$parent_str[$j] = '|';
			for($i = 0; $i < count($parent); $i ++)
			{
				if($j == 0)
				{
					if($parent[$i] == 0)
					{
						$id_str[$j] = $id_str[$j].$id[$i].'|';
						$parent_str[$j] = $parent_str[$j].$parent[$i].'|';
						$k --;
					}
				}else{
					if(strpos($id_str[$j - 1],'|'.$parent[$i].'|') !== false)
					{
						$id_str[$j] = $id_str[$j].$id[$i].'|';
						$parent_str[$j] = $parent_str[$j].$parent[$i].'|';
						$k --;
					}
				}
			}
			$j ++;
		}
		//将子级分类倒序排列
		for($i = 1; $i < count($id_str); $i ++)
		{
			$str1 = '';
			$str2 = '';
			$id_arr = explode('|',$id_str[$i]);
			$parent_arr = explode('|',$parent_str[$i]);
			for($j = 1; $j < count($id_arr); $j ++)
			{
				$str1 = $id_arr[$j].'|'.$str1;
				$str2 = $parent_arr[$j].'|'.$str2;
			}
			$id_str[$i] = $str1;
			$parent_str[$i] = $str2;
		}
		//将子级分类插入父级分类后面
		if(count($id_str) - 1 > 0) $cat_str = $id_str[0];
		for($i = 1; $i < count($id_str); $i ++)
		{
			$id_arr = explode('|',$id_str[$i]);
			$parent_arr = explode('|',$parent_str[$i]);
			for($j = 1; $j < count($parent_arr) - 1; $j ++)
			{
				if(strpos($cat_str,'|'.$parent_arr[$j].'|') !== false)
				{
					$cat_str = str_replace('|'.$parent_arr[$j].'|','|'.$parent_arr[$j].'|'.$id_arr[$j].'|',$cat_str);
				}
			}
		}
		//获取等级信息
		$arr = explode('|',$cat_str);
		for($i = 1; $i < count($arr) - 1; $i ++)
		{
			for($j = 0; $j < count($id_str); $j ++)
			{
				if(strpos($id_str[$j],'|'.$arr[$i].'|') !== false) $grade_str = $grade_str.($j + 1).'|';
			}
		}
		return $cat_str.'{v}'.$grade_str;
	}
	 
}
//新秀
?>