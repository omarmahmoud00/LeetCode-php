class Solution {
    public int searchInsert(int[] nums, int target) {
         int l = 0, r = nums.length - 1;
          while (l <= r) {
            int m = l + (r - l) / 2;
 
            // Check if x is at mid
            if (nums[m] == target)
                return m;
 
            if (nums[m] < target)
                l = m + 1;
            else
                r = m - 1;
        }
        return (r+1);
    }
}