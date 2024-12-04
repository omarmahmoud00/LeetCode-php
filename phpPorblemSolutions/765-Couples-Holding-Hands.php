
class Solution {

    /**
     * @param Integer[] $row
     * @return Integer
     */
    function minSwapsCouples($row) {
        $swaps = 0;
        $n = count($row);

        for ($i=0; $i < $n; $i+=2) { 
             $exp = $this->getExpectedParent($row[$i]);
           if ($row[$i + 1] == $exp) {
                continue;
            }

            $parent_index = array_search($exp,$row);
                    $temp = $row[$parent_index] ; 
                   $row[$parent_index] = $row[$i+1];
                     $row[$i+1] = $temp;   
                     $swaps+=1;

           
        } 

       return $swaps; 
    }

    private function getExpectedParent($num){
        if($num%2==0) return ($num+1);
        else return ($num-1);
    }
}