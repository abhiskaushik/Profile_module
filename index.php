<?php
 require('autosuggest.php');
$con= mysql_connect("127.0.0.1","root","abhishek");
$db='profile_module';
$db_con=mysql_select_db($db,$con);
$query="SELECT * FROM  `students` ";
$results=mysql_query($query,$con);
$new_entries= mysql_num_rows($results);
$src='download.jpg';

 echo "<div id='contain' style='width:85%;margin-left:13%;margin-top:5%;position:absolute;'>";
   while($row = mysql_fetch_array($results))
  {
    echo "<div class='prof' style='height:160px;width:160px;background:rgba(0,0,0,0.5);border-radius:50%;border-width:1px;border-color:#000;border-style:solid;box-sizing:border-box;float:left;margin-left:20px;margin-top:80px;overflow:hidden'>
<img src=".$row['Picture']." height='55%' width='100%' style='margin-top:1px'/>
<div style='width:160px;position:relative;top:9px;background:grey;border-radius:0%;text-align:center;cursor:pointer;font-size:12px;font-weight:bold;color:white'>" .$row['Name']." <br>".$row['Roll']." <br> ".$row['Branch']."
<br> ".$row['DOB']."</div>

</div>";
    
  }
echo "</div>";
 
/*
$title=$_POST["title"];
 
  
 $result=mysql_query("SELECT * FROM search WHERE Name LIKE "%'.$title.'%" OR Roll LIKE "%'.$title.'%" ");
 $found=mysql_num_rows($result);
 
 if($found>0){
//echo "<srcipt> document.getElementById('contain').style.display='none';</script>";
echo "<div style='width:90%;margin-left:5%;margin-top:5%;background:rgba(0,0,0,0.6);z-index:10;position:absolute'>";
   while($rows = mysql_fetch_array($result))
  {
    echo "<div style='height:160px;width:160px;background:rgba(0,0,0,0.5);border-radius:50%;border-width:1px;border-color:#000;border-style:solid;box-sizing:border-box;float:left;margin-left:20px;margin-top:80px;background:url(".$src.");background-position:-18px -23px'>
<div style='width:160px;position:relative;top:130px;background:grey;border-radius:20%;text-align:center'>" .$rows['Name']." <br>".$rows['Roll']." <br> ".$rows['Branch']."</div>

</div>";
    
  }
echo "</div>";

}

if (isset($_GET['name'])) {
    $data = "%".$_GET['name']."%";
    $sql = 'SELECT * FROM students WHERE Name like ?';
    $stmt = $db_con->prepare($sql);
    $results = $stmt->execute(array($data));
    $rows = $stmt->fetchAll();
}
if(empty($rows)) {
    echo "<tr>";
        echo "<td colspan='4'>There were not records</td>";
    echo "</tr>";
}
else {
    foreach ($rows as $row1) {
        echo "<tr>";
            echo "<td>".$row1['Id']."</td>";
            echo "<td>".$row1['Name']."</td>";
            echo "<td>".$row1['Roll']."</td>";
            echo "<td>".$row1['Branch']."</td>";
        echo "</tr>";
    }
}

*/



mysql_close($con);



?>
<html>
<head>
<script type="text/javascript" src="http://static.tumblr.com/bmdsqsc/8mXm7q8vn/jquery.js"></script>
<script type="text/javascript" src="http://static.tumblr.com/bmdsqsc/ogWm7q8w1/lazyload.js"></script>
<script type="text/javascript" charset="utf-8">
var $j = jQuery.noConflict();
$j(function() {
if (navigator.platform == "iPad" || navigator.platform == "iPhone") return;
$j("img").lazyload({
placeholder : "http://static.tumblr.com/twte3d7/RSvlio0k5/grey.gif",
effect: "fadeIn",
});
});
</script>
<style>
.mid {
   
   width: 140px;
   height: 50px;
   margin: 1px;
   padding: 1px;
   border: 1px solid rgba(0,0,0,0.5);
   border-radius: 1px 1px 0px 0px;
   background: rgba(40,10,20,0.6); color:white;font-size:12px;cursor:pointer;
   box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 2px rgba(255,255,255,0.2), inset 0 2px 4px rgba(255,255,255,0.25), inset 0 -10px 10px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
 
}

#suggest {
    width: 160px;
    padding: 15px;
    margin: 100px auto 50px auto;
    //background: #444;
    background: rgba(60,0,0,.2);
    border-radius: 10px;
    box-shadow: 0 1px 1px rgba(0,0,0,.4) inset, 0 1px 0 rgba(255,255,255,.2);
}
 
/* Form text input */
 
#suggest input {
    width: 160px;
    height: 26px;
    padding: 10px 5px;
    float: left;    
    font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 0;
    background: rgba(60,0,0,0.6); margin-left:2px;
    border-radius: 3px 0 0 3px;      
}
 
#suggest input:focus {
    outline: 0;
    background: rgba(87,221,45,0.2);
    box-shadow: 0 0 2px rgba(10,0,0,.8) inset;
}
 
#suggest input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
}
 
#suggest input:-moz-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}
 
#suggest input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
}    
 
/* Form submit button */
/*
#suggest button {
    overflow: visible;
    position: relative;
    float: right;
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 110px;
    font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
    color: #fff;
    text-transform: uppercase;
    background: #d83c3c;
    border-radius: 0 3px 3px 0;      
    text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
}   
   
#suggest button:hover{     
    background: #e54040;
}   
   
#suggest button:active,
#suggest button:focus{   
    background: #c42f2f;
    outline: 0;   
}
 
#suggest button:before {
    content: '';
    position: absolute;
    border-width: 8px 8px 8px 0;
    border-style: solid solid solid none;
    border-color: transparent #d83c3c transparent;
    top: 12px;
    left: -6px;
}
 
#suggest button:hover:before{
    border-right-color: #e54040;
}
 
#suggest button:focus:before,
#suggest button:active:before{
        border-right-color: #c42f2f;
}      
 
#suggest button::-moz-focus-inner { 
    border: 0;
    padding: 0;
} 
rgb(345,234,675)
*/

#MainMenu 
{ 
    height:37px; 
    //background: grey; 
    margin:0; 
    border:0; position:absolute;left:15%;; 
}

#tab 
{ 
    margin:0; 
    top:0; 
} 
#tab ul 
{ 
    margin:0; 
    padding:0; 
    list-style:none; 
    float:left; 
} 
#tab li 
{ 
display:inline; 
    float:left; 
    margin:0; 
    padding:0; 
} 
#tab a 
{ 
    background: url("back.jpg") no-repeat right top; 
    margin:10; 
    padding:10; 
    text-decoration:none; 
    border:10px; 
    display:block; 
    float:left; 
} 
#tab a span 
{ 
    display:block; 
    background:url("back.jpg") no-repeat left top; 
    padding:0 25px 0 25px; 
    font-family:Arial, Helvetica, sans-serif; 
    font-size:11; 
    color:#FFFFFF; 
    font-weight:bold; 
    line-height:37px; 
} 
#tab a:hover,#tab li.item_active a 
{ 
    background-position:right bottom; 
    border-color:; 
} 
#tab a:hover span,#tab li.item_active a span 
{ 
    background-position:left bottom; 
    color:lightblue; 
    font-weight:bold; font-size:20px; 
    font-style:normal; 
    text-decoration:none; 
}
.prof{
  
   -webkit-box-shadow: 2px 2px 6px white, inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);





}
</style>
</head>
 <body bgcolor="rgba(32,145,56,0.1)"> <!--
<input id="name" type="text" style='position:absolute;left:0%;top:18%;' placeholder="Search" />
-->
<div id="MainMenu"> 
    <div id="tab"> 
        <ul> 
            <li class="item_active"><a href="#"><span>Link1</span></a></li> 
            <li><a href="#"><span>Link2</span></a></li> 
            <li><a href="#"><span>Link3</span></a></li> 
            <li><a href="#"><span>Link4</span></a></li> 
            <li><a href="#"><span>Link5</span></a></li> 
            <li><a href="#"><span>Link6</span></a></li> 
            <li><a href="#"><span>Link7</span></a></li> 
        </ul> 
    </div> 
</div>


<div id="suggest" style='position:absolute;left:0%;top:10%;'>
  <input type="text" size="20" value="" id="country" onkeyup="suggest(this.value);" onblur="fill();fillId();" autofocus  placeholder="Search.." />
 <input type="hidden" name="country_id" id="country_id" value="" />
  <div class="suggestionsBox" id="suggestions" style="display: none;"> <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
  </div>
</div>

</body>
</html>
