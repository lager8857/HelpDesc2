<?php
	session_start();
require_once("includes/dbconnect.php");
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">HelpDesc</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Заявки 
			
			<?php
			if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket`")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<span href="get_messages.php" class="alert-link badge badge-dark">'.$row_cnt.'</span>';
			?>
			
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="get_messages.php?st=2">Прочитанные
			<?php
			if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket` WHERE `status` = '2'")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<span href="get_messages.php" class="alert-link badge badge-info">'.$row_cnt.'</span>';
			?></a>
          <a class="dropdown-item" href="get_messages.php?st=1">Не прочитанные
			<?php
			if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket` WHERE `status` = '1'")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<span href="get_messages.php" class="alert-link badge badge-warning">'.$row_cnt.'</span>';
			?></a>
			 <a class="dropdown-item" href="get_messages.php?st=3">Решено
			<?php
			if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket` WHERE `status` = '3'")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<span href="get_messages.php" class="alert-link badge badge-success">'.$row_cnt.'</span>';
			?></a>
          
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">Главная страница</a>
      </li>
      
	<li class="nav-item">
        <a class="nav-link " href="users.php">Пользователи</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link " href="chat_index.php">Чат</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
		<?php
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		?>
       <a class="btn btn-outline-info mr-sm-2" href="form_auth.php">Авторизация</a>
     <a class="btn btn-outline-info my-2 my-sm-0" href="form_register.php">Регистрация</a>
		<?php
			}else{
		?>
		<ul class="navbar-nav ">
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-sm-2" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['surname'].' '.$_SESSION['firstname']; ?>
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href="cp.php">Личный кабинет</a>
			<a class="dropdown-item " href="user.php">Страница пользователя</a>
          <a class="dropdown-item " href="logout.php">Выход</a>
          
        </div>
      </li>
		</ul>
		
		<?php
			}
		?>
    </form>
  </div>
</nav>
</br>