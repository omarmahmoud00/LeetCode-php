class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $max_left[0]=0;
        $left = 0;
        $n = count($height);
        $max_left = array_fill(0,$n,0);

        // 0,1,0,2,1,0,1,3,2,1,2,1
        for($i=1;$i<$n;$i++){
            $max_left[$i] = max($left,$height[$i-1]);
            if($height[$i-1]>$left){ 
                $left = $height[$i-1];
            } 
        }
        $max_right = array_fill(0,$n,0);
        $max_right[($n-1)]=0;
        $rigth = 0;
        for ($i=($n-2); $i >=0 ; $i--) { 
            $max_right[$i]= max($rigth,$height[$i+1]);
            if($height[$i+1]>$rigth){
                $rigth = $height[$i+1];
            } 
        }
        $sum = 0;
        for ($i=0; $i < $n; $i++) { 
                $min  = min($max_left[$i],$max_right[$i]);

                if(($min-$height[$i])>0){
                    $sum+=($min-$height[$i]);
                }

        }

        return $sum;

    }




}