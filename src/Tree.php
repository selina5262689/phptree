<?php  
/*------------------------------------------------------------------------
 * Tree.php
 * 	
 * 构建tree状数据
 *
 * Created on 2019-06-17 09:39:54
 *
 * Author: 蚊子 <1423782121@qq.com>
 * 
 * Copyright (c) 2019 All rights reserved.
 * ------------------------------------------------------------------------
 */
namespace phptree;
class Tree {
	
	private static $primary     = 'id'; 		// 主键名
	private static $parentId    = 'parent_id';  // 父键名
	private static $children    = 'children'; 	// 子键名
	private static $outputLabel = 'label'; 		// 输出名
	private static $outputValue = 'value'; 		// 输出值

	private static $parentIds   = []; // 存储最顶级ID值主键值
	private static $indexData   = []; // 索引数据

	/**
	 * [setConfig 设置配置信息]
	 * @param string $primary     [description]
	 * @param string $parentId    [description]
	 * @param string $children    [description]
	 * @param string $outputLabel [description]
	 * @param string $outputValue [description]
	 */
	public static function setConfig($primary = '', $parentId = '', $children = '', $outputLabel = '', $outputValue = '') {
		if (!empty($primary)) {
            self::$primary = $primary;
        }

        if (!empty($parentId)) {
            self::$parentId = $parentId;
        }

        if (!empty($children)) {
            self::$children = $children;
        }

        if (!empty($outputLabel)) {
            self::$outputLabel = $outputLabel;
        }

        if (!empty($outputValue)) {
            self::$outputValue = $outputValue;
        }
	}

	public static function generateDataTree($data = []) {
		if(empty($data)) {
			return [];
		}

		$parent = self::getParentData($data);
		$result = [];

		foreach ($data as $item) {
			if (isset($parent[$item[self::$parentId]])) {
				$parent[$item[self::$parentId]][self::$children][] = &$parent[$item[self::$primary]];
			} else {
				$result[] = &$parent[$item[self::$primary]];
			}
		}

		unset($parent);
		return $result;
	}

	/**
	 * [getParentData 获取父数据]
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	private static function getParentData($data = []) {
		if(empty($data)) {
			return [];
		}

		$result = [];
		$index_data = [];
		foreach ($data as $key => $value) {
			$index_data[$value[self::$primary]] = $value;
		}
		return $index_data;
	}

}
