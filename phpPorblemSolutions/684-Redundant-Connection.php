class Solution {

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges) {
        $n = count($edges);
        
        
        $parent = [];
        $rank = [];
        
        for ($i = 1; $i <=$n; $i++) {
            $parent[$i] = $i;
            $rank[$i] = 0;
        }

        foreach ($edges as $edge) {
            $u = $edge[0] ;  
            $v = $edge[1];  
            
            
            if ($this->find($u, $parent) == $this->find($v, $parent)) {
                return $edge;  
            } else {
                $this->union($u, $v, $parent, $rank); 
            }
        }

    }

  
    private function find($node, &$parent) {
        if ($parent[$node] != $node) {
            $parent[$node] = $this->find($parent[$node], $parent);  
        }
        return $parent[$node];
    }

    private function union($u, $v, &$parent, &$rank) {
        $root_u = $this->find($u, $parent);
        $root_v = $this->find($v, $parent);

  
        if ($root_u != $root_v) {
            if ($rank[$root_u] > $rank[$root_v]) {
                $parent[$root_v] = $root_u;
            } elseif ($rank[$root_u] < $rank[$root_v]) {
                $parent[$root_u] = $root_v;
            } else {
                $parent[$root_v] = $root_u;
                $rank[$root_u]++;  
            }
        }
    }
}
