class Solution {
    public boolean isValid(String s) {
         int x=0;
        if(s.length()%2==1) return false;
        
         ArrayList<Character> li = new ArrayList<Character>();


        for(int i=0;i<s.length();i++)
        {
            if(s.charAt(i)=='(' || s.charAt(i)=='{'||s.charAt(i)=='[')
            {
                li.add(s.charAt(i));
                x++;
            }
            else
            {     if(x<=0) return false;
               	if(s.charAt(i)==')'&&li.get(x-1)!='(') return false;
                    else if(s.charAt(i)==']'&&li.get(x-1)!='[') return false;
                    else if(s.charAt(i)=='}'&&li.get(x-1)!='{') return false;
                    else { 
                    
                        x--;
                        li.remove(x); }
            }

        }
         if(x>0) return false;
         return true;
    }
	
    
}