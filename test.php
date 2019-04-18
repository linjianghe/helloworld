<?php
$arr = [1,3,2,5,4,1,2];
var_dump(bubble_sort($arr));
function bubble_sort($arr){
	$count = count($arr);
	if($count<=1){
		return $arr;
	}
	for($i=1;$i<$count;$i++){
		for($j=0;$j<$count-$i;$j++){ 
			if($arr[$j]>$arr[$j+1]){ 
				$tmp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $tmp;
			}
		}
	}
	return $arr;
}
function select_sort($arr){
	$count = count($arr);
	if($count<=1){
		return $arr;
	}
	$base = $arr[0];
	$left = $right = [];
	for($i=1;$i<$count;$i++){
		if($arr[$i]<$base){
			$left[] = $arr[$i];
		} else {
			$right[] = $arr[$i];		
		}
	}
	$left = select_sort($left);
	$right= select_sort($right);
	return array_merge($left,[$base],$right);
}