<?php
include("includes/head.php");
?>
<body>
<?php

	require_once("includes/dbconnect.php");
    require_once("includes/header.php");
?>	
	
	
	
	<div class="container-fluid" style="height:200px;">
		<div class="row">
			
		<div class="alert alert-info offset-md-1 col-md-4" role="alert">	
	<?php		
			echo '<h4 class="alert-heading" align="center" ><b>'. $_SESSION['firstname'].'</b>, приветствую тебя в личном кабинете!</h4>';
		?>	

  <p class="m-b-2">Ты можешь посмотреть заявки</p>
			 
  <p class="m-b-2">Я верю, что у тебя всё получится и из этого выйдет забавная штука.</p>
</div>
			
		<div class="  col-md-4 offset-md-2 " >	
	<div class="card ">
  <div class="card-header">
    Статистика заявок
  </div>
  <div class="card-block">
    <div class="alert alert-success badge badge-dark offset-md-1 col-md-1 " role="alert">
				<?php
				if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket`")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<a href="get_messages.php" class="alert-link">'.$row_cnt.'</a>';
	  ?>
		
</div>
	
	   <div class="alert alert-info offset-md-1 col-md-1 " role="alert">
				<?php
				if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket` WHERE `status` = '1'")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<a href="#" class="alert-link">'.$row_cnt.'</a>';
	  ?>
</div>
	  
  </div>
</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid" >
		<div class="row">
			
		<div class="offset-sm-1 col-md-4" >	
	<div class="card ">
  <div class="card-header">
    Последние изменения
  </div>
		
  <div class="card-block">
   <table class="table table-hover table-sm " >
  <thead>
    <tr>
      <th>#</th>
      <th>Тема</th>
      <th>От кого</th>
		
      <th>Кому</th>
		<th>Дата</th>
		<th>Прочитано</th>
		
    </tr>
  </thead>
	<tbody>
		
	   </tbody>
	  </table>
  </div>
</div>
			</div>
			
		<div class="  col-md-4 offset-md-2 " >	
	<div class="card ">
  <div class="card-header">
    Последнее из центра знаний
  </div>
  <div class="card-block">
    <div class="alert alert-success offset-md-1 col-md-1 " role="alert">
				<?php
				if ($num_mess = $mysqli->query("SELECT `id` FROM `ticket` WHERE `status` = '0'")) {

    /* определение числа рядов в выборке */
    $row_cnt = $num_mess->num_rows;}
				
	  echo '<a href="#" class="alert-link">'.$row_cnt.'</a>';
	  ?>
</div>
	  
  </div>
</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid" style="height:20px;">
		<div class="row">
			<div class="col-md-6">
		<div class="card">
			<div class="card-header">
    Последние входящие заявки
  </div>
  <div class="card-body">		
	<table class="table table-hover table-sm " >
  <thead>
    <tr>
      <th>#</th>
      <th>Тема</th>
      <th>От кого</th>
		
      <th>Кому</th>
		<th>Создан</th>
		<th>Статус</th>
		<th>Удалить</th>
		
    </tr>
  </thead>
	<tbody>
	
		
<?php	
		

		
		$test = " SELECT ticket.id,ticket.date,ticket.status, user1.firstname, user1_1.firstname,problem.name,status.name, ticket.message
FROM `user1` AS user1_1, user1, ticket,problem,status WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) ORDER BY `ticket`.`id` ASC  ";
	if ($tabl = $mysqli->query($test));		
while ($row = $tabl->fetch_row()){
	$test = $row['0'];
echo '
 <tr id ="1test" onClick="window.alert(\''.$row['7'].'\');">
      <th scope="row" >'.$row['0'].'</th>
      <td >'.$row['5'].'</td>
	  <td>'.$row['3'].'</td>
      <td>'.$row['4'].'</td>
	   <td>'.$row['1'].'</td>
      <td class="badge badge-info">'.$row['6'].'</td>
	  <td><a href="delete.php?act=deletemess&id='.$row['0'] .'">X</a>
	  </td>
    </tr>
';
	  /* {
    echo "<tr>";
    echo "<th>" . $row['0'] . "</th>";
    echo "<td>" . $row['5'] . "</td>";
    echo "<td>" . $row['3'] . "</td>";
    echo "<td>" . $row['4'] . "</td>";
    echo "<td>" . $row['1'] . "</td>";
    echo "<td>" . $row['6'] . "</td>";
    echo "</tr>";
    }*/
};
	?>
 </tbody>
</table>
			</div></div>

	</div>
			<div class="col-md-3">	
			<form action="search.php" method="post" enctype="multipart/form-data">
					<div class = "form-group">
             <label for="exampleFormControlSelect1">Кому:</label>
			 
             <select class="custom-select" id="exampleFormControlSelect1" name="to">
				 <?php 
				$zapr_result = $mysqli->query("SELECT * FROM `user1`", MYSQLI_USE_RESULT);
				
				while($row = mysqli_fetch_assoc($zapr_result))
				{
					$id = $row['id'];				
    				$name = $row['firstname']; //имя

    
					echo "<option value=\"$id\">$name</option>"; // выводим
				}
					?>
			
             </select></div>
					</div>
				<div class="col-md-3">	
				<div class = "form-group">
             <label for="exampleFormControlSelect1">От кого:</label>
			 
             <select class="custom-select" id="exampleFormControlSelect1" name="from">
				 <?php 
				$zapr_result1 = $mysqli->query("SELECT * FROM `user1`", MYSQLI_USE_RESULT);
				
				while($row = mysqli_fetch_assoc($zapr_result1))
				{
					$id = $row['id'];				
    				$name = $row['firstname']; //имя

    
					echo "<option value=\"$id\">$name</option>"; // выводим
				}
					?>
			
             </select>
					</div>
				</div>
				<div class = "container-fluid">
				<div class = "form-group col-md-3">
              <label for="exampleFormControlTextarea1">Введите дату от :</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="date1" required></textarea>
					</div>
				<div class = "form-group col-md-3">
              <label for="exampleFormControlTextarea1">Введите дату до:</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="date2" required></textarea>
				
				</div>
					<input type="submit" name="send" class="btn btn-primary" value="Отправить">	
				</div>
				<div class="block_for_messages">
			<?php
				if(isset($_SESSION["serever_message"])){

					echo $_SESSION["serever_message"];

					unset($_SESSION["serever_message"]);
				}
			?>
		</div>
				
				</form>
				
			
		</div></div></div>
	
	
	
</body>