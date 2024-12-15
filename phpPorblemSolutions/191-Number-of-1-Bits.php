class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        $bin = decbin($n);
        $res =0;
        $size  = strlen($bin);
        for($i=0;$i<$size ; $i++){
            if($bin[$i]=='1') $res+=1; 

        } 
        return $res;
    }
}