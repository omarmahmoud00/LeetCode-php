    class Solution {

        /**
        * @param Integer $n
        * @param Integer $m
        * @param Integer[] $group
        * @param Integer[][] $beforeItems
        * @return Integer[]
        */
      function sortItems($n, $m, $group, $beforeItems) {
 
    for ($i = 0; $i < $n; $i++) {
        if ($group[$i] == -1) {
            $group[$i] = $m++;
        }
    }

    $degree = array_fill(0, $n-1, 0);
    $outgoing = [];
    $this->preparing($degree, $group, $beforeItems, $outgoing, $cycled);
    if ($cycled) return [];


    $itemOrder = $this->Topological($n, $degree, $outgoing);
    if (count($itemOrder) != $n) return []; 

   
    $groupedItems = [];
    foreach ($itemOrder as $item) {
        $groupedItems[$group[$item]][] = $item;
    }


    $groupDegree = array_fill(0, $m, 0);
    $groupOutgoing = [];
    foreach ($beforeItems as $curr => $dependencies) {
        foreach ($dependencies as $prev) {
            if ($group[$prev] != $group[$curr]) {
                $groupOutgoing[$group[$prev]][] = $group[$curr];
                $groupDegree[$group[$curr]]++;
            }
        }
    }

    $groupOrder = $this->Topological($m, $groupDegree, $groupOutgoing);
    if (count($groupOrder) != $m) return [];

   
    $result = [];
    foreach ($groupOrder as $g) {
        if (isset($groupedItems[$g])) {
            $result = array_merge($result, $groupedItems[$g]);
        }
    }

    return $result;
}

 function preparing(&$degree,$group,$beforeItems,&$outgoing,&$cycled){
      
        foreach($beforeItems as $index=> $item){
            $deg = count($item);
            $degree[$index]=$deg;
            
            if($deg==0) {
                $cycled=false;
            }
            if($deg>0){
                foreach ($item as $it) {
                  
                    $outgoing[$it][]=$index;
                 
                }
            }else{
                $outgoing[$index]= $outgoing[$index] ?? [];
            }
  
        }
     

    }

 private function Topological($n,&$degree,$outgoing){
        $order=[];
        $q= new SplQueue();
        for($i=0;$i<$n;$i++){
            if($degree[$i]==0){
                $q->enqueue($i);
            }
        }
        $array=[];
        while(!$q->isEmpty()){
            $or = $q->dequeue();
            $order[]=$or;
            $array = $outgoing[$or]??[];
            if(!empty($array)){
                foreach($array as $arr){
                    $degree[$arr]=$degree[$arr]-1;
                    if($degree[$arr]==0){
                        $q->enqueue($arr);
                    }
                }
            }
        }
        return $order;

        
    }

    }