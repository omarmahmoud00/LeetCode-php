class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $last_index = count($nums) - 1; 
        $found = false;
        
        if ($nums[0] == 0 && ($last_index+1) > 1) return false;
        if ($nums[0] == 0 && ($last_index+1) == 1) return true;

        while ($last_index > 0) {
            $i = $last_index - 1;
            $steps_that_i_needed = 1;  

            $found = false;  
            while ($i >= 0) {
                if ($nums[$i] >= $steps_that_i_needed) {
                    $last_index = $i;  
                    $found = true;
                    break;  
                } else {
                    $i--;
                    $steps_that_i_needed++;
                }
            }

            if (!$found) {
                return false;  
            }
        }

        return true;  
    }
}
