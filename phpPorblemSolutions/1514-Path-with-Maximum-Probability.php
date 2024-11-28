class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Float[] $succProb
     * @param Integer $start_node
     * @param Integer $end_node
     * @return Float
     */
    function maxProbability($n, $edges, $succProb, $start_node, $end_node) {
        $graph = [];
        $this->prepareGraph($edges, $succProb, $graph, $n);

        $maxProb = array_fill(0, $n, 0.0);  
        $maxProb[$start_node] = 1.0;

        $pq = new SplPriorityQueue();
        $pq->insert([$start_node, 1.0], 1.0);

        while (!$pq->isEmpty()) {
            [$current_node, $current_prob] = $pq->extract();

         
            if ($current_node == $end_node) {
                return $current_prob;
            }

            
            if (isset($graph[$current_node])) {
                foreach ($graph[$current_node] as [$neighbor, $prob]) {
                    $new_prob = $current_prob * $prob;

                   
                    if ($maxProb[$neighbor] < $new_prob) {
                        $maxProb[$neighbor] = $new_prob;
                        $pq->insert([$neighbor, $new_prob], $new_prob);
                    }
                }
            }
        }

        
        return 0.0;
    }

    private function prepareGraph($edges, $succProb, &$graph, $n) {
      
        for ($i = 0; $i < $n; $i++) { 
            $graph[$i] = [];
        }

    
        foreach ($edges as $index => $edge) {
            $graph[$edge[0]][] = [$edge[1], $succProb[$index]];
            $graph[$edge[1]][] = [$edge[0], $succProb[$index]]; 
        }
    }
}
