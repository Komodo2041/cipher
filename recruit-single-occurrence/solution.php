<?php
/**
 * Znajduje liczby, które się nie powtarzają
 *
 * @param $input array Tablica liczb
 * @return array
 */


function findSingle(array $input): array
{
    $count = [];
    foreach ($input AS $key ) { 
        $key = (string) $key;
        if (isset($count[ $key])) {
            $count[$key]++;
        } else {
            $count[$key] = 1;
        }
    }
 
    $res = array_filter($count, function ($var) { return $var == 1;});
	return $res;
}

print_r(findSingle([1, 2, 3, 4, 1, 2, 3]));
// Array
// (
//     [0] => 4
// )


print_r(findSingle([11, 21, 33.4, 18, 21, 33.39999, 33.4]));
// Array
// (
//     [0] => 11
//     [1] => 33.39999
//     [2] => 18
// )
