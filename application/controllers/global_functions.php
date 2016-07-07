<?php
function merg($bigarray , $id_name)
/*
this function takes big array that contains elements with repeated feather
it create a new array indexed with this new feather and each element
is an array that contains values of all these repeated feathers
*/
{
	$result = array();
	foreach ($bigarray as $value) {
		$id = $value[$id_name];
		//unset($value[$id_name]);
		$result[$id][] = $value;
	}
	return $result;
}

function only_first($arr)
/*
takes the output of merg function and the remaining will be only the first element
*/
{
	$res = array();
	foreach ($arr as $key => $value) {
		{
			foreach ($value as $sm_key => $sm_value) {
				$res[$key] = $sm_value;
				break;
			}
		}
	}
	return $res;
}

function make_repeated_index($arr , $index_name)
{

}

function merg_similar($big_indexed , $small_indxed , $index_name)
/*
this function takes two arrays with common key and merg them together
*/
{
	$result = array();
	foreach ($big_indexed as $value) {

		$big_key = $value[$index_name]; //now big key is the common id
		$result[$big_key] = $value;
		if(isset($small_indxed[$big_key])) //if the small array contains that id
		{
			$result[$big_key]['feathers'] = $small_indxed[$big_key];
		}
			
	}
	return $result;
}
?>