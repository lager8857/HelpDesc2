<?php
session_start();

	require_once("includes/dbconnect.php");
/**
 * Принимаем постовые данные. Очистим сообщение от html тэгов
 * и приведем id получателя к типу integer
 */

	
$executor=$_SESSION['id'];
$autor=(int)$_POST['autor'];
$message= htmlspecialchars($_POST['mess']);
$messageID=(int)$_POST['idmess'];
$status=(int)$_POST['stat'];

$run = $mysqli->query("INSERT INTO `chat` (`id_ticket`,`id_autor`,`id_executor`) values('".$messageID."','".$autor."','".$executor."')");
$mess = $mysqli->query("INSERT INTO `chat_mess` (`id_user`,`mess`) VALUES ('".$executor."','".$message."')");
$upd = $mysqli->query("UPDATE `ticket` SET `status` = 2 WHERE `id`='".$messageID."'");

if (($_POST["stat"]))
	$status = $mysqli->query("UPDATE `ticket` SET `status` = 3 WHERE `id`='".$messageID."'");
	
	
if(isset($_POST["submit"])) {
    $_SESSION["send"] = 'Сообщение отправлено!';
   //exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}


	if(!$run){

				$messages = "<p class='message_error'><strong>Ошибка!</strong> При отправке сообщения произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				echo ($messages);

			}else{

				$messages = "<p class='success_message'>Сообщение успешно отправлено! <br /> Теперь Вы можете авторизоваться используя Ваш адрес электронной почты ( Email ) и пароль </p>";
				echo ($messages);
			} 
		 
		 
		 /*
Дополнительная проверка на пустое сообщение


<?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; 

if(isset($_POST['mess'])){

				$message = trim($_POST['mess']);

				if(!empty($message)){

					$message = htmlspecialchars($message, ENT_QUOTES);
				}else{

					echo "<script>alert('У вас пустое сообщение');</script>";
					//redirect_to($message, 'form_register.php');
				}

			}?>*/ 

//Отправляем сообщение
/*$result_query_insert = $mysqli->query("INSERT INTO `ticket` (autor, executor, message, problem,status) VALUES ('".$from."', '".$to."', '".$message."','".$probl."',1) ");
if(isset($_POST["send"])) {
    $_SESSION["send"] = 'Сообщение отправлено!';
   exit('<meta http-equiv="refresh" content="0; url=index.php" />');
}
if(!$result_query_insert){

				$messages = "<p class='message_error'><strong>Ошибка!</strong> При отправке сообщения произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				echo ($messages);

			}else{

				$messages = "<p class='success_message'>Сообщение успешно отправлено! <br /> Теперь Вы можете авторизоваться используя Ваш адрес электронной почты ( Email ) и пароль </p>";
				echo ($messages);
			}

			$mysqli->close();*/