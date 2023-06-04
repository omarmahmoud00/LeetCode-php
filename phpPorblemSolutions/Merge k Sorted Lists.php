 <?php
 
  class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
     $this->val = $val;
      $this->next = $next;
       }
     }
 

     class Solution {

      /**
       * @param ListNode[] $lists
       * @return ListNode
       */
      function mergeKLists($lists) {
  
          $results = [];
          foreach ($lists as $list) {
            $current = $list;
            while ($current!=null) {
                  $results [] =$current->val;
                  $current = $current->next;
            }
          }

          rsort($results);

          $mainLinkedList = null;
          foreach($results as $result){
            $mainLinkedList = new ListNode($result, $mainLinkedList);
          }

          return $mainLinkedList;
         
          
      }
  }

