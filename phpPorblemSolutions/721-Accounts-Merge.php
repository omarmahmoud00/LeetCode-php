class Solution {

    /**
     * @param String[][] $accounts
     * @return String[][]
     */
    function accountsMerge($accounts) {
        $parent = [];
        $graph = [];
        $rank_array = [];
        $this->prepareParentAndGraph($parent, $accounts, $graph, $rank_array);

        foreach ($graph as $pair_emails) {
            $u = $pair_emails[0];
            $v = $pair_emails[1];
            $this->union($u, $v, $parent, $rank_array);
        }

  
        $groups = [];
        foreach ($parent as $email => $p) {
            $root = $this->find($email, $parent);
            $groups[$root][] = $email;
        }

       
        $result = [];
        foreach ($groups as $root => $emails) {
          
            $name = null;
            foreach ($accounts as $account) {
                if (in_array($root, $account)) {
                    $name = $account[0];
                    break;
                }
            }

            sort($emails); 
            array_unshift($emails, $name);
            $result[] = $emails;
        }

        print_r($result);
        return $result;
    }

    function union($u, $v, &$parent, &$rank_array) {
        $root_u = $this->find($u, $parent);
        $root_v = $this->find($v, $parent);

        if ($root_u != $root_v) {
            if ($rank_array[$root_u] > $rank_array[$root_v]) {
                $parent[$root_v] = $root_u;
            } elseif ($rank_array[$root_u] < $rank_array[$root_v]) {
                $parent[$root_u] = $root_v;
            } else {
                $parent[$root_v] = $root_u;
                $rank_array[$root_u]++;
            }
        }
    }

    function find($node, &$parent) {
        if ($parent[$node] != $node) {
            $parent[$node] = $this->find($parent[$node], $parent);
        }

        return $parent[$node];
    }

    function prepareParentAndGraph(&$parent, $accounts, &$graph, &$rank_array) {
        foreach ($accounts as $account) {
            foreach ($account as $value) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    if (!isset($parent[$value])) {
                        $parent[$value] = $value; 
                        $rank_array[$value] = 0; 
                    }
                }
            }
        }

        $graph = [];
        foreach ($accounts as $account) {
            $emails = [];
            foreach ($account as $value) {
                if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $emails[] = $value;
                }
            }

            $count = count($emails);
            for ($i = 0; $i < $count - 1; $i++) {
                $graph[] = [$emails[$i], $emails[$i + 1]];
            }
        }
    }
}
