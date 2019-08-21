<?php
include("includes/head.php");
?>
<body>
<?php

	require_once("includes/dbconnect.php");
    require_once("includes/header.php");
?>
	
	<?php 
	$id = $_SESSION['id'];
	
	
	//$id = $_SESSION['id'];
	$zapr_user = $mysqli->query("SELECT * FROM `user1` where `id`= '$id'", MYSQLI_USE_RESULT);
				
				while($row = mysqli_fetch_assoc($zapr_user))
				{
					
					$firstname = $row['firstname'];				
    				$surname = $row['surname'];
					$middlename = $row['middlename'];
					$email = $row['email'];
				}
	
	$zapr_mess = " SELECT ticket.id,ticket.date,ticket.status, user1.firstname, user1_1.firstname,problem.name,status.name, ticket.message
FROM `user1` AS user1_1, user1, ticket,problem,status WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) ORDER BY `ticket`.`id` ASC  ";
	if ($tabl = $mysqli->query($zapr_mess));		
while ($row = $tabl->fetch_row()){				
$id = $row['0'];
$tema = $row['5'];
	$autor = $row['3'];
	$executor = $row['4'];
	$date = $row['1'];
	$status = $row['2'];
	$message = $row['7'];
}
	
	
	?>
	
	<div class="container">
	<form action="user_send.php" method="post">
  <fieldset disabled id="test">
	  <div class="form-group">
      <label for="disabledTextInput">Фамилия</label>
      <input type="text" id="disabledTextInput" name="surname" required class="form-control" placeholder="<?php echo $surname ?>">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Имя</label>
      <input type="text" id="disabledTextInput" name="firstname" required class="form-control" placeholder="<?php echo $firstname ?>">
    </div>
	   
	  <div class="form-group">
      <label for="disabledTextInput">Отчество</label>
      <input type="text" id="disabledTextInput" name="middlename" required class="form-control" placeholder="<?php echo $middlename ?>">
    </div>
	  <div class="form-group">
      <label for="disabledTextInput">Email</label>
      <input type="text" id="disabledTextInput" name="email" required class="form-control" placeholder="<?php echo $email ?>">
    </div>
  </fieldset>
	<button type="button" id="but" class="btn btn-info">Изменить</button>	
		<input type="submit" name="send" id="but1" disabled class="btn btn-primary" value="Отправить">
</form>
	</div>
	
	
	<div class="container">
	<form action="send_mess.php" method="post">
  <fieldset disabled id="test1">
	  <div class="form-group">
      <label for="disabledTextInput">Сообщение</label>
      <input type="text" required id="disabledTextInput" name="surname" class="form-control" placeholder="<?php echo $message ?>">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Проблема</label>
      <input type="text" required id="disabledTextInput" name="firstname" class="form-control" placeholder="<?php echo $tema ?>">
    </div>
	  <div class = "form-group">	
						<label for="exampleFormControlSelect3">Укажите вашу проблему:</label>
						<select class="custom-select" id="exampleFormControlSelect3" name="problm">
					<?php 
						$probl_result = $mysqli->query("SELECT * FROM `problem` ", MYSQLI_USE_RESULT); //Берёт выборку из базы
				
						while($rowp = mysqli_fetch_assoc($probl_result))
					{
							$idp = $rowp['id'];				
    						$namep = $rowp['name']; //имя
     
    					echo "<option value=\"$idp\">$namep</option>"; // выводим
					}
					?>

             </select>
					</div>	
	   
  </fieldset>
	<button type="button" id="but_mess"  class="btn btn-info">Изменить</button>	
		<input type="submit" name="send" disabled id="send_mess_but" class="btn btn-primary" value="Отправить">
</form>
	</div>
	
	
	<script>
	jQuery('#but').click(function(){
jQuery('#test').prop('disabled',false);
		jQuery('#but1').prop('disabled',false);
jQuery('#but').prop('disabled',true);
});
jQuery('#but_mess').click(function(){
jQuery('#test1').prop('disabled',false);
		jQuery('#send_mess_but').prop('disabled',false);
jQuery('#but_mess').prop('disabled',true);
});
		
		
 

	</script>
	
</body>
<?php 
	session_reset();
			 ?>