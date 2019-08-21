<?php

	session_start();

	require_once("../includes/dbconnect.php");

	if(isset($_POST["btn_submit_auth"])){

		
			//======= Обработка адреса электронной почты ============
			if(isset($_POST["username"])){

				$username = trim($_POST["username"]);

				if(empty($username)){

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите адрес Вашей электронной почты</p>";
					redirect_to($message, 'login/form_auth.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода адреса электронной почты</p>";
				redirect_to($message, 'login/form_auth.php');
			}

			//======= Обработка пароля ============
			if(isset($_POST["password"])){

				$password = trim($_POST["password"]);

				if(!empty($password)){

					$password = htmlspecialchars($password, ENT_QUOTES);

					$password = md5($password."top_secret");
				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Укажите Ваш пароль</p>";
					redirect_to($message, 'login/form_auth.php');
				}

			}else{

				$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода пароля</p>";
				redirect_to($message, 'login/form_auth.php');
			}

			$result_query_select = $mysqli->query("SELECT surname, firstname FROM `user1` WHERE username = '".$username."' AND password = '".$password."'");

			if(!$result_query_select){

				$message = "<p class='message_error'><strong>Ошибка!</strong> Ошибка запроса на выборке пользователя из базы данных. </p><p>Описание ошибки: $mysqli->error <br /> Код ошибки: $mysqli->errno </p>";
				redirect_to($message, 'login/form_auth.php');
			}else{

				if($result_query_select->num_rows == 1){

					while ( $info_user = $result_query_select->fetch_assoc() ) {

						$_SESSION['surname'] = $info_user['surname'];
						$_SESSION['firstname'] = $info_user['firstname'];
					}

					$_SESSION["username"] = $email;
					$_SESSION["password"] = $password;
	
					$result_query_select->close();

					redirect_to($message, '../index.php');
				}else{

					$message = "<p class='message_error'><strong>Ошибка!</strong> Вы ввели неправильный логин и/или пароль </p>";
					redirect_to($message, 'login/form_auth.php');
				}

			}

		//}else{

			//$message = "<p class='message_error'><strong>Ошибка!</strong> Отсутствует поле для ввода капчи </p>";
			//redirect_to($message, 'form_auth.php');
		//}

	}else{

		exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site.">главную страницу</a>.</p>");

	}

?>