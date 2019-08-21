<?php
include("includes/head.php");
include("includes/header.php");
require_once("includes/dbconnect.php");

?>


<!DOCTYPE html>
<html>
<head>
<title>chat system</title>
<link rel="stylesheet" href="css/style.css" media="all"/>
<script>
function ajax(){
var req= new XMLHttpRequest();

req.onreadystatechange=function(){
if(req.readyState== 4 && req.status == 200){

document.getElementById('chat').innerHTML=req.responseText;
}	
}
req.open('GET','chat.php',true);
req.send();

}
setInterval(function(){ajax();},1000);
</script>
</head>
	
	
	
	
<body onload="ajax();">
<div id="container">
<div id="chat_box">
<div id="chat"></div>
</div>
<form method="post" action="chat_index.php">
<input type="text" name="name" readonly value=<?php echo $_SESSION['firstname']?> />
<textarea name="text" placeholder="enter message"></textarea>
<input type="submit" name="submit" value="send it"/>
</form>
</div>
<?php
	
if(isset($_POST['submit'])){
	$name=$_SESSION['id'];
	$text=$_POST['text'];
$query="INSERT INTO `chat_mess` (`id_user`,`mess`) values('$name','$text')";
$run=$mysqli->query($query);
if($run){
	echo "<embed loop='false' src='2.mp3' hidden='true' autoplay='true' />";
}
}

?>
</body>
</html>

	
<!--	$checkchat = $mysqli->query("SELECT * FROM chat");
	while($row = mysqli_fetch_assoc($checkchat))
					{
							$id = $row['id'];				
    						$autor = $row['id_autor'];
	                        $executor = $row['id_executor'];
							$a = $name;
					}
	echo '
		'.$a.'<br>
		'.$autor.'<br>
		'.$executor.'<br>';
	
	
	if ($a = $autor and $executor) {
		
		echo '
		'.$a.'<br>
		'.$autor.'<br>
		'.$executor.'<br>
		<h1>У тебя нет активного диалога<h1>';
		
	}
		
	else {
	}
	-->


