


<?php 
session_start();

	require_once("includes/dbconnect.php");




$date1=htmlspecialchars($_POST['date1']);
$date2=htmlspecialchars($_POST['date2']);

	
	
	$date = $mysqli->query("SELECT * FROM ticket
  WHERE date BETWEEN STR_TO_DATE('".$date1."', '%Y-%m-%d %H:%i:%s') 
  AND STR_TO_DATE('".$date2."', '%Y-%m-%d %H:%i:%s');");
//while($rowp = mysqli_fetch_assoc($date))
if ($tabl = $mysqli->query($date));		
while ($row = $tabl->fetch_row())
{
							
     
    					//echo "<option value=\"$idp\">$namep</option>"; // выводим
					}
if(!$date){

				$message = "<p class='message_error'><strong>Ошибка!</strong> При регистрации произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				redirect_to($message, 'form_register.php');

			}else{

				$message = '<table class="table table-hover table-sm " >
  <thead>
    <tr>
      <th>#</th>
      <th>Тема</th>
      <th>От кого</th>
		
      <th>Кому</th>
		<th>Дата</th>
		<th>Статус</th>
		<th>Удалить</th>
		
    </tr>
  </thead>
	<tbody><tr>
      <th scope="row" >'.$row['0'].'</th>
      <td >'.$row['5'].'</td>
	  <td>'.$row['3'].'</td>
      <td>'.$row['4'].'</td>
	   <td>'.$row['1'].'</td>
      <td>'.$row['6'].'</td>
	  <td><a href="delete.php?act=deletemess&id='.$row['0'] .'">X</a>
	  </td>
    </tr>
				
				
				<option value=\"$idp\">$namep</option>';
				redirect_to($message, 'cp.php');
			}

			$mysqli->close();
	?>