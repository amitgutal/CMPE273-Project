


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Redis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://oss.maxcdn.com/bootbox/4.2.0/bootbox.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
    var values = $('input:checkbox:checked.group1').map(function () {
  return this.value;
  console.log(values);
}).get();
    </script>
    <script type="text/javascript">
$(document).ready(function(){
jQuery('#Distribute').submit(function ($){
            jQuery.ajax({
                type: 'POST',
                url: 'http://localhost:8081',
                success: function (result) {  
                }                                           
            });
        });	
});
	</script>
    <script type="text/javascript">
                var units = {
                    title: 'Distribution'
                };
                var optionsPie = {
                    chart: {
                        renderTo: 'containers',
                        defaultSeriesType: 'pie'
                    },
                    title: {
                        text: 'Redis Distribution'
                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.y + 'keys ';
                        }
                    },
                    series: []
                };

                $(document).ready(function() {                                                         
                    $.get('somefile.csv', function(data) {
                        var seriesPie = {
                            data: []
                        };
                        var seriesPieItem = new Array();
                 
                        var lines = data.split('\n');

                        $.each(lines, function(lineNo, line) {
                            var items = line.split(',');
                            if (lineNo == 0) {
                                $.each(items, function(itemNo, item)
                                {
                                    //if (itemNo == 0) optionsPie.title.text = item;
                                    if (itemNo == items.length - 1) units.title = item;
                                });
                            }
                         
                            else
                            {
                                seriesPieItem = new Array();                               
                                $.each(items, function(itemNo, item)
                                {
                                    if (itemNo == 0)
                                    {
                                        seriesPieItem.push(item);                                       
                                    }
                                    else
                                    {
                                        seriesPieItem.push(parseFloat(item));                                       
                                    }
                                });                               
                                seriesPie.data.push(seriesPieItem);
                            }
                        });

                        optionsPie.series.push(seriesPie);
                        var chart = new Highcharts.Chart(optionsPie);
                    });                   
                });
</script>

<script type="text/javascript">
function clickk(value){
  console.log("helvalue");
  console.log(value);
}
function reply_click(clicked_id)
{
  var temp="#"+clicked_id;
  $(temp).remove();
  console.log("removed");
}


</script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Redis</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul> -->
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="273.jpg" alt="Image">   
      </div>

      <div class="item">
        <img src="2731.jpg" alt="Image">    
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<br><br>
<h3 style="text-align:left;float:left;">&nbsp &nbsp<u>Available Servers</u></h3>
<br><br><br>
<form action="#" method="post">
  <div class="col-sm-4">
  <div class="well">
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6379"><label>127.0.0.1:6379</label><br/>
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6380"><label>127.0.0.1:6380</label><br/>
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6381"><label>127.0.0.1:6381</label><br/>
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6382"><label>127.0.0.1:6382</label><br/>
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6383"><label>127.0.0.1:6383</label><br/>
&nbsp &nbsp &nbsp<input type="checkbox" name="check_list[]" value="127.0.0.1:6384"><label>127.0.0.1:6384</label><br/>
<br>
&nbsp &nbsp &nbsp<input type="submit" name="submit" value="Add"/>
&nbsp

</div>
</div>
</form>
<form id="Distribute" >
<input type="submit" value="Distribute"></input>
</form>
<?php
$myfile = fopen("server.txt", "w") or die("Unable to open file!");
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected){
fwrite($myfile, $selected);
fwrite($myfile,"\n");
//echo $selected."</br>";
}
}
}
fclose($myfile);
?>
<br><br>


<div class="container">    
  <!-- <h3 style="text-align:left;float:left;">Available Servers</h3> -->
<!--   <p style="text-align:right;float:right;">Available Servers</p><br>   -->
 <div id="containers" style="text-align:right;float:right; width: 500px; height: 400px; margin: 0 auto"></div>
  <hr style="clear:both;"/>

<!-- </form> -->
  <!-- <div class="row">
    <div class="col-sm-4">
      <div class="well">
 -->
<!--         <p id="ip1">127.168.1.1:5888</p>
        <p id="ip2">126.168.1.1:5888</p>
        <p id="ip3">125.168.1.1:5888</p>
        <p id="ip4">124.168.1.1:5888</p>
        <p id="ip5">123.168.1.1:5888</p>     -->
<!--       </div>
      <a class="btn btn-success" role="button" onclick = "document.getElementById('investment').style.display='block';document.getElementById('fade').style.display='block'">Add</a>
    </div>
    <div style="text-align:right;float:right;" class="col-sm-4">
      <div class="well">
        <p>Some text..</p>
      </div>
    </div>
  </div>
 -->

  <br>
<!--   <p>This is a paragraph.</p>
  <p id="xyz">This is another paragraph.</p>
  <button id="ip1" onClick="reply_click(this.id)">Remove</button>
 -->  <!-- <iframe src="../server.txt"></iframe> -->
</div>

 <!-- <div id="containers" style="width: 800px; height: 400px; margin: 0 auto"></div> -->


<br>



<h3>Log Data</h3>
<iframe src="logfile.log" style="width: 900px; height: 400px; margin: 0 auto"></iframe>

<footer class="container-fluid text-center">
  <p>Redis Company</p>
</footer>

</body>
</html>
