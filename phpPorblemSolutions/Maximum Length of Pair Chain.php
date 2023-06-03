<?php
class Solution {

/**
 * @param Integer[][] $pairs
 * @return Integer
 */
function findLongestChain($pairs) {
    $this->mergeSort($pairs);
    $num = 0;
    $size = count($pairs);

                $i=0;
        while ( $i < $size ) { 
            # code...
                   for ($j=$i+1; $j <$size ; $j++) { 
                    if(($j)<$size) {
                          if($pairs[$i][1]>=$pairs[($j)][0]){
                             $num++; 
                          } else {
                            $i=$j; 
                            break;
                          } 

                    }
                   
                    }
                   
                       $i=$j;
        }

    return ($size - $num);
}

function mergeSort(&$pairs) {
    $length = count($pairs);

    if ($length < 2) {
        return;
    }

    $mid = $length / 2;
    $left = array_slice($pairs, 0, $mid);
    $right = array_slice($pairs, $mid);

    $this->mergeSort($left);
    $this->mergeSort($right);

    $this->merge($left, $right, $pairs);
}

function merge(&$left, &$right, &$pairs) {
    $leftLength = count($left);
    $rightLength = count($right);
    $i = $j = $k = 0;

    while ($i < $leftLength && $j < $rightLength) {
        if ($left[$i][1] < $right[$j][1]) {
            $pairs[$k++] = $left[$i++];
        } else {
            $pairs[$k++] = $right[$j++];
        }
    }

    while ($i < $leftLength) {
        $pairs[$k++] = $left[$i++];
    }

    while ($j < $rightLength) {
        $pairs[$k++] = $right[$j++];
    }
}
}