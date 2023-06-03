<?php



class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
     function sortColors(&$nums) {
        if(count($nums)<2) return;

         for ($i=0; $i < count($nums) ; $i++) { 
            $key = $nums[$i];
            $j=($i-1);
                 
                   for($j;$j>=0;$j--){

                        if($nums[$j]>$key){

                              $nums[$j+1]=$nums[$j];

                        } else break;  
                           
                   } 

            $nums[$j+1]=$key;
         }
    
}
}