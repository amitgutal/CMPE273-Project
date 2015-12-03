# 273Test  
# Build a scalable web cache using consistent hashing or HWR hashing on top of Redis.  

## Usage  
Distribute data on different redis servers/instances using consistent hashing.  
### Pre-required Installations  
Wamp server(v2.5)  
Redis  
Mozilla Firefox(Recommended)  
Node js(esp. package 'express')  

###Steps
1) Switch on all the Redis instances (127.0.0.1:6379/127.0.0.1:6380/127.0.0.1:6381/127.0.0.1:6382/127.0.0.1:6383/127.0.0.1:6384).  
2) Copy all the files other than the consistentHashing folder onto C:\wamp\www(if windows).   
3) Go to the folder where Test.js is located(wamp folder) and do "node Test.js"(without quotes).  
4) Put the Wamp server online.  
5) Type localhost/index.php in browser(Mozilla).    
6) Upon opening, to add any no. of redis servers click across their respective IP's and say Add.  
7) After the page reloads, click on Distribute.  
8) Wait for sometime i.e. until "somefile.csv" is created in the folder.  
9) Refresh the browser.  
Now you see a pieChart explaining the count of Keys on the Servers.Also you can see logfile details as well.  
