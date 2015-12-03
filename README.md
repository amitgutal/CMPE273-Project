# 273Test  
# Build a scalable web cache using consistent hashing or HWR hashing on top of Redis.  

## Usage  
Distribute data on different redis servers/instances using consistent hashing.  
### Pre-required Installations  
Wamp server(v2.5)  
Redis  
Mozilla Firefox(Recommended)  
Node js(esp. package 'express')  

####File Explanations
data.xls - Key-Value pair of data which needs to be stored on redis server instances.  
index.php - php file that needs to be executed on localhost(via Wamp).  
Test.js - Node js file which needs to be executed before running the distribution of Keys.    
ConsistentHahing.jar - a jar file of the code which is exceuted via node js i.e. through Test.js.   
ConsistentHashing - Folder that has java code in it.  

###Steps
1) Switch on all the Redis instances (Typically, 127.0.0.1:6379/127.0.0.1:6380/127.0.0.1:6381/127.0.0.1:6382/127.0.0.1:6383/127.0.0.1:6384).  
2) Copy all the files other than the consistentHashing folder onto C:\wamp\www(if windows).   
3) Go to the folder where Test.js is located(wamp folder) and do "node Test.js"(without quotes).  
4) Put the Wamp server online.  
5) Type localhost/index.php in browser(Mozilla).    
6) Upon opening, to add any no. of redis servers click across their respective IP's and say Add.  
7) After the page reloads, click on Distribute.  
8) Wait for sometime i.e. until "somefile.csv" is created in the folder.  
9) Refresh the browser.  
Now you see a pieChart explaining the count of Keys on the Servers.Also you can see logfile details as well.  

Comments: The java project (ConsistentHashing folder), can also be executed separately to test the functionality, just make sure to change the file paths(data.xls/somefile.csv) in the code.  
If you need to change the redis instances, you can change the index.php file, or change the server.txt which is created after you click on Add button.  
To check consistent hashing functionality, floow above steps again with same data, but select fewer redis instances. This time you should see different distribution of Keys as per consistent hashing algorithm.  
