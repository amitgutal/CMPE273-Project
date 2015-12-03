
var express = require('express');

var app = express();
var fs=require('fs');
var exec = require('child_process').exec;

// app.get('/',function(req,res){
// exports.csv1 = function(req, res){
//   var  market=req.param('category');
//   console.log(market);
          
//   var data = [
//               ["market"],
//               [market]
//             ];
//   console.log("before");
//   csv().from.array(data).to.path('C:/Users/Shubham/Downloads/public/newusers.txt');
// }
// app.get('/server',function(req,res){
// var arr = [ [ 1921, 2 ],
//   [ 1922, 2 ],
//   [ 1923, 2 ],
//   [ 1924, 2 ],
//   [ 1925, 2 ],
//   [ 1926, 2 ],
//   [ 1927, 2 ],
//   [ 1928, 2 ] ];

// var file = fs.createWriteStream('array.txt');
// file.on('error', function(err) { /* error handling */ });
// arr.forEach(function(v) { file.write(v.join(', \n') + '\n'); });
// file.end();
// });

// require("fs").writeFile(
//      'array.txt',
//      arr.map(function(v){ return (v.join(', ').join('\n'));}),
//      function (err) { console.log(err ? 'Error :'+err : 'ok'); }
// );


// fs.writeFile("users.txt", "Hey there!", function(err) {
//     if(err) {
//         return console.log(err);
//     }

//     console.log("The file was saved!");
// });
app.get('/',function(req,res){
fs.readFile('index.php', function (err, data) {
  if(err!=null)
	  console.log(err)
    console.log(data)
	res.writeHead(200, {'Content-Type': 'text/html'});
	res.write(data)
   res.end();
});
})
app.post('/', function (req, res) {
   exec('java -jar ConsistentHash.jar "server.txt"', function(error, stdout, stderr) {
	   if(stderr!=null)
		   console.log(stderr)
		console.log(stdout);
   })

  
})
app.listen(8081);

