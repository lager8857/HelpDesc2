<?php
require_once("../includes/header2.php");
require_once("../includes/head2.php");
?>

<body>
<script type="text/javascript">
		$(document).ready(function(){
			"use strict"

			$("input[name=email]").blur(function(){

				if($(this).val() != ''){

					var email_pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;

					if(!email_pattern.test($(this).val())){

						$('#error_email_message').text('Не правильный формат');

						$('input[type=submit]').attr('disabled', true);
					}else{

						$('#error_email_message').empty();
						$('input[type=submit]').attr('disabled', false);
					}

				}else{
					$('#error_email_message').text('Введите Ваш Email');
					$('input[type=submit]').attr('disabled', true);
				}
			});

			$("input[name=password]").blur(function(){

				if($(this).val().length < 6){

					$('#error_password_message').text('Минимальная длина пароля 6 символов');
					$('input[type=submit]').attr('disabled', true);
					
				}else{

					$('#error_password_message').empty();
					$('input[type=submit]').attr('disabled', false);
				}

			});

		});
	</script>
	<?php
		

		if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
	?>
		<div class="row">
    <div class="col">
     
    </div>
    
   
		<div class="block_for_messages col-5">
			<?php
				if(isset($_SESSION["serever_message"])){

					echo '<div class="alert alert-info">'.$_SESSION["serever_message"].'</div>';

					unset($_SESSION["serever_message"]);
				}
								?>
		</div>
			<div class="col">
     
    </div>
  </div>
<div class="row">
	
	<div class="col-sm">
		</div>
	
	
	<div class="col-sm"> 
		<div class="container_form">
			
			<h2>Форма регистрации</h2>

			<form action="register.php" method="POST" class="form-group" name="form_register" >
				<div class = "form-group">
				<label for="exampleInputName1">Фамилия:</label>
    <input type="text" class="form-control" id="exampleInputName1" name="surname" minlength="2" maxlength="255" required  placeholder="Введите Фамилию">
    		
				</div>
				
				<div class = "form-group">
				<label for="exampleInputName1">Имя:</label>
    <input type="text" class="form-control" id="exampleInputName1" name="firstname" minlength="2" maxlength="255" required  placeholder="Введите имя">
    		
				</div>				
				
				<div class = "form-group">
				<label for="exampleInputName1">Отчество:</label>
    <input type="text" class="form-control" id="exampleInputName1" name="middlename" minlength="2" maxlength="255" required  placeholder="Введите отчество">
    		
				</div>
				
				<div class = "form-group">
				<label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" minlength="2" maxlength="255" required aria-describedby="emailHelp" placeholder="Введите Email">
    		
				</div>
			<div class = "form-group">
				<label for="exampleInputName1">Логин:</label>
    <input type="text" class="form-control" id="exampleInputName1" name="username" minlength="2" maxlength="255" required  placeholder="Введите логин">
    		
				</div>
				<div class = "form-group">
				<label for="exampleInputPassword1">Пароль:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" minlength="6" maxlength="255" required placeholder="Минимум 6 символов">
    		
				</div>

				
				<button type="submit" name="btn_submit_register" class="btn btn-primary">Регистрация</button>
					
			</form>

		</div>
	</div>
	<div class="col-sm">
		</div>
		</div>
	<?php
		}else{
	?>
			<div id="authorized">
				<h2>Вы уже зарегистрированы</h2>
			</div>

	<?php
		}
		
		require_once("../includes/footer.php");
	?>

</body>
</html>