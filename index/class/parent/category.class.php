<?php
class category extends table
{
	private $cat = array();
	
	public function __construct()
	{
		parent::__construct();
		
		$this->prefix = 'cat_';
	}
	
	public function get_tree()
	{
		$flag = 0;
		$arr = parent::get_list();
		if(count($arr))
		{
			for($i = 0; $i < count($arr); $i ++)
			{
				$this->cat[$i][0] = $arr[$i][$this->prefix.'id'];
				$this->cat[$i][1] = $arr[$i][$this->prefix.'parent_id'];
				$this->cat[$i][2] = $arr[$i][$this->prefix.'name'];
				if($this->cat[$i][1] != 0) $flag = 1;
			}
			return $this->set_cat_order($this->cat,0,1,$flag);
		}else{
			return $this->cat;
		}
	}
	
	public function set_prefix($val)
	{
		$this->prefix = $val;
	}
	
	//对分类进行排序，调用了get_cat_order()，并对其返回结果进行处理，a代表ID下标，b代表父类ID下标，flag标志是否存在第二级分类
	private function set_cat_order($arr,$a,$b,$flag)
	{
		$arr1 = array();
		$arr2 = array();
		$arr5 = array();
		$u1 = count($arr);
		$u2 = count($arr[0]);
		if($u1 > 0 && $flag == 1)
		{
			for($i = 0; $i < $u1; $i ++)
			{
				$arr1[$i] = $arr[$i][$a];
				$arr2[$i] = $arr[$i][$b];
			}
			if($u1 > 0)
			{
				$cat_order = explode('{v}',$this->get_cat_order($arr1,$arr2));
				$arr3 = explode('|',$cat_order[0]);
				$arr4 = explode('|',$cat_order[1]);
				for($i = 1; $i < count($arr3) - 1; $i ++)
				{
					for($j = 0; $j < $u1; $j ++)
					{
						if($arr[$j][0] == $arr3[$i])
						{
							for($k = 0; $k < $u2; $k ++)
							{
								$arr5[$i - 1][$k] = $arr[$j][$k];
							}
							$arr5[$i - 1][$u2] = $arr4[$i];
						}
					}
				}
			}
		}elseif($u1 > 0 && $flag == 0){
			for($i = 0; $i < $u1; $i ++)
			{
				for($k = 0; $k < $u2; $k ++)
				{
					$arr5[$i][$k] = $arr[$i][$k];
				}
				$arr5[$i][$u2] = 1;
			}
		}
		return $this->reset_arr($arr5);
	}
	
	//对无序多级分类进行排序，返回一个记录排序信息的特殊字符串
	private function get_cat_order($id,$parent)
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
	
	private function reset_arr($arr)
	{
		$return = array();
		for($i = 0; $i < count($arr); $i ++)
		{
			$return[$i]['id'] = $arr[$i][0];
			$return[$i]['parent'] = $arr[$i][1];
			$return[$i]['name'] = $arr[$i][2];
			$return[$i]['grade'] = $arr[$i][3];
		}
		return $return;
	}
	 
}
//新秀
?>