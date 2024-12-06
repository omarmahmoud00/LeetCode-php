class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minimumObstacles($grid) {
          $n = count($grid);
        $m = count($grid[0]);
        $pq = new SplPriorityQueue();
        $pq->insert([0,0],0);
        $cost_matrix = array_fill(0,$n,array_fill(0,$m,PHP_INT_MAX));
        $all_dirctions = [[-1,0],[1,0],[0,-1],[0,1]];
        $cost_matrix[0][0]=0;

        while(!$pq->isEmpty()){
            list($i,$j) = $pq->extract();
            $current_cost = $cost_matrix[$i][$j];
            foreach($all_dirctions as $dir){
                $new_i = $i + $dir[0];
                $new_j = $j + $dir[1];

        if($new_i>=0&&$new_i<$n && $new_j>=0 && $new_j<$m){
                $new_cost = $current_cost + $grid[$new_i][$new_j];
                if($new_cost < $cost_matrix[$new_i][$new_j]){
                    $cost_matrix[$new_i][$new_j] = $new_cost;
                    $pq->insert([$new_i,$new_j],-$new_cost);
                }
        }

            }
        }

    return $cost_matrix[$n-1][$m-1];

    }
}