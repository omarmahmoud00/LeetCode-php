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
       * @param ListNode $head
       * @return ListNode
       */
        function deleteDuplicates($head) {
   
    
  
           $temp = $head;
           
             if ($temp === null||$temp->next === null) {
              return $head;
               }
  
           while($temp!=null&& $temp->next!=null){
            if($temp->val==$temp->next->val){
  
                 $temp->next=$temp->next->next;
            } else{
            $temp= $temp->next; 
  
            }
  
           }
  
           return $head;
           
       }
  }
 


