class Solution {

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s) {
        $pattern_len = strlen($pattern);
        $s_len = strlen($s);
        
        $map = [];
        $new_s = [];
        $i=0;
        while($i<$s_len){
        if ( $s[$i] == ' ') $i++;
            
             $word = '';
             while($s[$i]!=\ \ &&$i < $s_len){
                $word.=$s[$i] ;
                $i++;
             }
           
            $new_s [] = $word;

        }
        if (count($new_s) != $pattern_len) return false;
    $map2=[];
        for($i=0;$i<$pattern_len;$i++){
            if(!isset($map[$pattern[$i]])){

                if(!isset($map2[$new_s[$i]])){
                $map2[$new_s[$i]] = $pattern[$i];

                }else if($map2[$new_s[$i]] != $pattern[$i]){
                return false;
                }

                $map[$pattern[$i]] = $new_s[$i];


            }else if($map[$pattern[$i]] != $new_s[$i]){
                return false;
            }else{

            }
        }
return true;
    }
}