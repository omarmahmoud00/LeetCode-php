class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        $totalGas = array_sum($gas);
        $totalCost = array_sum($cost);

        if ($totalCost > $totalGas) {
            return -1; 
        }

 
        $pq = new SplPriorityQueue();  
        $matrix = [];
        $n = count($gas);

        $this->prepare($gas, $cost, $pq, $matrix);

        while (!$pq->isEmpty()) {
            $data = $pq->extract(); 
            $start = $data['index'];
            $stop = $start;
            $sum = 0; 

            do {
                $sum += $matrix[$start];  
                if ($sum < 0) {
                    break;  
                }
                $start = ($start + 1) % $n; 
            } while ($start != $stop);

            if ($start == $stop && $sum >= 0) {
                return $stop;
            }
        }

        return -1; 
    }

    
    function prepare($gas, $cost, &$pq, &$matrix) {
        for ($i = 0; $i < count($gas); $i++) {
            $netGas = $gas[$i] - $cost[$i]; 
            if ($netGas >= 0) {
                $pq->insert(['index' => $i], $netGas);  
            }
            $matrix[$i] = $netGas; 
        }
    }
}
