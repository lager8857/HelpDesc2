


<?php 
session_start();

	require_once("includes/dbconnect.php");


$id = $_SESSION['id'];

$surname=htmlspecialchars($_POST['surname']);
$firstname=htmlspecialchars($_POST['firstname']);
$middlename= htmlspecialchars($_POST['middlename']);
$email=htmlspecialchars($_POST['email']);
	
	
	$update = $mysqli->query("UPDATE `user1` SET `surname` = '".$surname."', `firstname` = '".$firstname."', `middlename` = '".$middlename."', `email` = '".$email."' WHERE `id` = '$id' ");


if(isset($_POST["send"])) {
    $_SESSION["send"] = 'Данные изменены!';
   exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}
if(!$update){

				$messages = "<p class='message_error'><strong>Ошибка!</strong> При отправке данных произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				echo ($messages);

			}else{

				$messages = "<p class='success_message'>Данные успешно изменены! <br /> </p>";
				echo ($messages);
			}

			$mysqli->close();


	?>
	