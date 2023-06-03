class Solution {
    public int removeDuplicates(int[] nums) {
        int i=0,j=0,c=1;
        while(i<nums.length){
            
              for(j=i+1;j<nums.length;j++){
                  if(nums[i]!=nums[j]) {
                      c++;
                      break;
                  }
                  else nums[j] =1002;
              }
              i=j;
        }
        Arrays.sort(nums);   
        return c;
    }
}