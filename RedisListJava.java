
// Need to install the Jedis Package 

// Download it from here : http://repo1.maven.org/maven2/redis/clients/jedis/2.1.0/jedis-2.1.0-sources.jar

// Tutorial Link : http://www.tutorialspoint.com/redis/redis_java.htm

import redis.clients.jedis.Jedis;
public class RedisListJava {
   public static void main(String[] args) {
      //Connecting to Redis server on localhost
      Jedis jedis = new Jedis("localhost");
      System.out.println("Connection to server sucessfully");
      //store data in redis list
      jedis.lpush("tutorial-list", "Redis");
      jedis.lpush("tutorial-list", "Mongodb");
      jedis.lpush("tutorial-list", "Mysql");
     // Get the stored data and print it
     List<String> list = jedis.lrange("tutorial-list", 0 ,5);
     for(int i=0; i<list.size(); i++) {
       System.out.println("Stored string in redis:: "+list.get(i));
     }
 }
}
