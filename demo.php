<?php 
require_once __DIR__ . '/vendor/autoload.php';
use phptree\Tree; 

$data = array(
	array("id" => "01", "parent_id" => "00","title" => "测试描述1	"),
	array("id" => "02", "parent_id" => "00","title" => "测试描述	"),
	array("id" => "03", "parent_id" => "00","title" => "测试描述3	"),
	array("id" => "11", "parent_id" => "00","title" => "测试描述11"),
	array("id" => "12", "parent_id" => "11","title" => "测试描述11-1"),
	array("id" => "13", "parent_id" => "11","title" => "测试描述11-2"),
	array("id" => "14", "parent_id" => "11","title" => "测试描述11-3"),
	array("id" => "15", "parent_id" => "11","title" => "测试描述11-4"),
	array("id" => "16", "parent_id" => "11","title" => "测试描述11-5"),
	array("id" => "17", "parent_id" => "11","title" => "测试描述11-6"),
	array("id" => "18", "parent_id" => "11","title" => "测试描述11-7"),
	array("id" => "19", "parent_id" => "01","title" => "测试描述1-1"),
	array("id" => "20", "parent_id" => "01","title" => "测试描述1-2"),
	array("id" => "21", "parent_id" => "01","title" => "测试描述1-3"),
	array("id" => "22", "parent_id" => "02","title" => "测试描述2-1"),
	array("id" => "23", "parent_id" => "02","title" => "测试描述2-2"),
	array("id" => "24", "parent_id" => "02","title" => "测试描述2-3"),
	array("id" => "25", "parent_id" => "03","title" => "测试描述3-1"),
	array("id" => "26", "parent_id" => "03","title" => "测试描述3-2"),
	array("id" => "27", "parent_id" => "03","title" => "测试描述3-3"),
	array("id" => "28", "parent_id" => "03","title" => "测试描述3-4"),
	array("id" => "29", "parent_id" => "03","title" => "测试描述3-5"),
	array("id" => "33", "parent_id" => "29","title" => "测试描述3-5"),
	array("id" => "34", "parent_id" => "29","title" => "测试描述3-5")
);

$tree = new Tree();

$tree::setConfig("id", "parent_id");

$list = $tree::generateDataTree($data);

var_dump($list);
