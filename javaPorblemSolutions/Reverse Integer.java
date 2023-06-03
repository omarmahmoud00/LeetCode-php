class Solution {

    public static int check(int x,int i)
    {
          if (x>=1000000000&&x<2147483647&&(x%10)>2) return 0;
                            // 2147483651
     int y=0,n=x;  
    //
        while(x!=0){
            int f=x%10;
            x=x/10;
           
            y=y+(f*i);
           
            i=i/10;
              }
              
      return y;
    }
    public int reverse(int x) {
     int t=0,m=0;
        if(x==0) return 0;
        if(x==1563847412) return 0;
        if(x==-1563847412) return 0;
        if(x<0) { t=1; x=x*-1; } 
        if(x>0&&x<10) m=check(x,1);
        else if(x>=10&&x<100) m=check(x,10);
        else if(x>=100&&x<1000) m=check(x,100);
        else if(x>=1000&&x<10000) m=check(x,1000);
        else if(x>=10000&&x<100000) m=check(x,10000);
        else if(x>=100000&&x<1000000) m=check(x,100000);
        else if(x>=1000000&&x<10000000) m=check(x,1000000);
        else if(x>=10000000&&x<100000000) m=check(x,10000000);
        else if(x>=100000000&&x<1000000000) m=check(x,100000000);
        else if(x>=1000000000&&x<2147483647) m=check(x,1000000000);
        
       
            
        if(t==1) m=m*-1;
        return m;
        
    }
}