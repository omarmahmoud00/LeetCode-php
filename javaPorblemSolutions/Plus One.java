class Solution {
    public int[] plusOne(int[] digits) {
       byte c=0;
         if(digits[(digits.length-1)]!=9){
              digits[(digits.length-1)]=digits[(digits.length-1)]+1;
              return digits;
         }

        //  if(digits[(digits.length-1)]==9&&digits.length==1){
        //    int arr[]=new int[2];
        //     arr[1]=0;
        //     arr[0]=1;
        //     return arr;
        //  } 
            for(int i=(digits.length-1);i>=0;i--)
            {
                if(digits[i]==9) c++;

            }
            
            if((digits.length)==c){
             int arr[]=new int[(digits.length+1)];
              arr[0]=1;   
            for(int i=1;i<arr.length;i++)
            {
                arr[i]=0;
            }
            return arr;
         } 
         else{
             for(int i=(digits.length-1);i>=0;i--)
            {
              if(digits[i]==9)  digits[i]=0;
              else{
                     digits[i]+=1;
                     break;
              }
            }
         }
             return digits;
                  

           
        
    }
}