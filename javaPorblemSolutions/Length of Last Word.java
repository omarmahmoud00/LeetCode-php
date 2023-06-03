class Solution {
    public int lengthOfLastWord(String s) {
       int count=0;
        int i=s.length()-1;
        while(i>=0){
        	if(s.charAt(i)!=' ')
            	count++;
            if(s.charAt(i)==' ' && count!=0)
             break;
            i--;
        }
    return count;
    }
    }
