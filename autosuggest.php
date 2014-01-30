<?php
if(isset($_REQUEST['act']) && $_REQUEST['act'] =='autoSuggestUser' && isset($_REQUEST['queryString'])) {
   $db_host = 'localhost';
   $db_user = 'root';
   $db_password = 'abhishek';
   $db_name = 'profile_module';
   $src='download.jpg';
   $connect = mysql_connect($db_host, $db_user ,$db_password);
   $db = mysql_select_db($db_name,$connect);
   if($db){
  	$string = '';
		$queryString = $_REQUEST['queryString'];
		$query = "SELECT * FROM students WHERE Name like'" .$queryString . "%' OR Roll like '" .$queryString. "%' OR Branch like '" .$queryString. "%' ";
		$resource = mysql_query($query);
		
		if($resource && mysql_num_rows($resource) > 0) {
		$string.= '<ul>';
			while($result = mysql_fetch_object($resource)){
				$string.= '<div class="mid" onClick="fillId(\''.addslashes($result->id).'\');fill(\''.addslashes($result->Name).'\');">'.$result->Name.'<br>'.$result->Roll.'<br>'.$result->Branch.'<div style="margin-left:86px;margin-top:-42px;height:40px;width:50px;border-radius:10%;overflow:hidden"><img src='.$result->Picture.' height="100%" width="100%" /></div></div>';		}
		$string.= '</ul>';
		} else {
			$string.= '<div class="mid" style="margin-left:40px;text-align:center;height:30px;font-size:15px">No Record found</div>';
		}
		echo '<div class="scroll" style="height:600px;overflow:auto;margin-left:-30px;">'   .$string. '<div>';		
		exit;

   }
   exit;
}
	
?>


<script type="text/javascript" src="jquery.js"></script>
<script>
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
	$.ajax({
	  url: "autosuggest.php",
	  data: 'act=autoSuggestUser&queryString='+inputString,
	  success: function(msg){
		  	if(msg.length >0) {
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(msg);
				$('#country').removeClass('load');
			}
	  }
	});
	}
}
	function fill(thisValue) {
	$('#country').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
}
function fillId(thisValue) {
	$('#country_id').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
}

</script>
<!--
<div id="suggest">Start to search: <br />
  <input type="text" value="" id="country" onkeyup="suggest(this.value);" onblur="fill();fillId();">
 <input type="hidden" name="country_id" id="country_id" value="" />
  <div class="suggestionsBox" id="suggestions" style="display: none;"> <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
  </div>
</div>
-->
<style>
.scroll::-webkit-scrollbar {
    width: 12px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.8); 
    border-radius: 10px; 
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9); 
}
​
</style>
