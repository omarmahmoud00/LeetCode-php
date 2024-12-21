class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $size_t = strlen($t);
        $size_s = strlen($s);
        
 
        if ($size_s == 0) return true;

        $j = 0;   

    
        for ($i = 0; $i < $size_t; $i++) {
            if ($s[$j] == $t[$i]) {
                $j++;  
            }
            if ($j == $size_s) {
                return true;  
            }
        }
        
        return false; 
    }
}
