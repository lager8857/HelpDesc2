<?php
require_once("includes/head.php");
?>
<body>
<?php

	require_once("includes/dbconnect.php");
    require_once("includes/header.php");
	
	$id = $_SESSION['id'];

	
	
	$label = 'st';
$st = false;
if (  !empty( $_GET[ $label ] )  )
{
  $st = $_GET[ $label ];
}
?>
	
	
<?php
if(!isset($_SESSION['firstname']) && !isset($_SESSION['password'])){
	
  
   echo '<h3>Ты не залогинился</h3>';

			}else{ 
	$mess = " SELECT ticket.id,ticket.date,ticket.status, user1.firstname,user1.id, user1_1.firstname,problem.name,status.name, ticket.message
FROM `user1` AS user1_1, user1, ticket,problem,status WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) AND (status.id=$st) ORDER BY `ticket`.`id` ASC  ";
	if ($tabl = $mysqli->query($mess));		
while ($row = $tabl->fetch_row()){
	$test = $row['0'];
	
	?>
	
	<div class="container">
	<form action="chat_send.php" method="post">
 <div class="alert alert-success" role="alert">
	 <?
	echo '
	<input class="form-control" type="text" name="idmess" value="'.$row['0'].'" placeholder='.$row['0'].' readonly>
	<input class="form-control" type="text" name="tema" value="'.$row['5'].'" readonly>
  <input class="form-control" type="hidden" name="autor" value="'.$row['4'].'" readonly>
   <input class="form-control" type="text" name="123" placeholder='.$row['2'].'  value="'.$row['3'].'" readonly>
  <input class="form-control" type="text"  value="'.$row['8'].'" readonly>
  
  <hr>
  <p class="mb-0">'.$row['1'].'</p>
  <p class="mb-0 badge badge-success">'.$row['7'].'</p>
  <div class="col-md-2">
    <input class="form-check-input" name="stat" type="checkbox" value="3">
  <label class="form-check-label" for="defaultCheck1">
    Решено
  </label>
  </div>
</div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Ответ:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mess" id="inputPassword" placeholder="">
    </div>
  </div>
  <div>
		<button type="submit" name="submit" class="btn btn-primary">Отправить</button>
		</div>
</form>
</div>
';

}
}
?>
			  </body>