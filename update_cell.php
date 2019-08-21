<?php
require_once("includes/dbconnect.php");


    // очищаем значение переменной, PHP фильтры FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH
    // (Удаляют тэги, при необходимости удаляет или кодирует специальные символы)
$value=htmlspecialchars($_POST['value'],ENT_QUOTES);
$id=htmlspecialchars($_POST['id'],ENT_QUOTES);
$field=htmlspecialchars($_POST['field'],ENT_QUOTES);


$message = "value=$value id=$id field=$field";
$message = $mysqli->real_escape_string($message);
//$message = real_escape_string($message);
//echo real_escape_string($message);
echo $message;
//redirect_to($message, 'users.php');}
   //$mess = $mysqli->query("UPDATE `user1` SET `username` = '".$value."' WHERE `id`='".$id."'");
//$mess = $mysqli->real_escape_string($mess);
 $mess = $mysqli->query("UPDATE `user1` SET $field = '".$value."' WHERE `id`='".$id."'");
if(!$mess){

				$messages = "<p class='message_error'><strong>Ошибка!</strong> При отправке сообщения произошла ошибка. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				echo ($messages);

			}else{

				$messages = "<p class='success_message'>Сообщение успешно отправлено! <br /> Теперь Вы можете авторизоваться используя Ваш адрес электронной почты ( Email ) и пароль </p>";
				echo ($messages);
			} 
		 

//$message2 = $mess;
//echo MyClass::CONSTANT . "\n";
?>