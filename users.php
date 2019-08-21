<?php
include("includes/head.php");
?>
	
<body>
<?php

	require_once("includes/dbconnect.php");
    require_once("includes/header.php");
?>

	<div class="container">
<div class="card-body col-md-12">		
	<table class="table table-hover table-sm"  id="user1">
  <thead>
    <tr>
      <th>#</th>
      <th>Логин</th>
      <th>email</th>
		
      <th>Фамилия</th>
		<th>Имя</th>
		<th>Отчество</th>
		<th>Группа</th>
		
		<th>Удалить</th>
		
    </tr>
  </thead>
	<tbody>
	
	
<?php	

		
		$test = " SELECT user1.id,user1.username,user1.email,user1.surname,user1.firstname,user1.middlename,user_group.name from user1,user_group WHERE user1.user_group=user_group.id";
	if ($tabl = $mysqli->query($test));		
while ($row = $tabl->fetch_row()){
	$test = $row['0'];
echo '
 <tr>
      <th scope="row" >'.$row['0'].'</th>
      <td class="edit username '.$row['0'].'">'.$row['1'].'</td>
	  <td class="edit email '.$row['0'].'">'.$row['2'].'</td>
      <td class="edit surname '.$row['0'].'">'.$row['3'].'</td>
	   <td class="edit firstname '.$row['0'].'">'.$row['4'].'</td>
      <td class="edit middlename '.$row['0'].'">'.$row['5'].'</td>
	  <td>'.$row['6'].'</td>
	 
	  <td><a href="delete.php?act=deleteuser&id='.$row['0'] .'">X</a>
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

	<script>
		//при нажатии на ячейку таблицы с классом edit
$('td.edit').click(function(){
//находим input внутри элемента с классом ajax и вставляем вместо input его значение
$('.ajax').html($('.ajax input').val());
//удаляем все классы ajax
$('.ajax').removeClass('ajax');
//Нажатой ячейке присваиваем класс ajax
$(this).addClass('ajax');
//внутри ячейки создаём input и вставляем текст из ячейки в него
$(this).html('<input id="editbox" size="'+ $(this).text().length+'" type="text" value="' + $(this).text() + '" />');
//устанавливаем фокус на созданном элементе
$('#editbox').focus();
});
		
	//определяем нажатие кнопки на клавиатуре
$('td.edit').keydown(function(event){
//получаем значение класса и разбиваем на массив
//в итоге получаем такой массив - arr[0] = edit, arr[1] = наименование столбца, arr[2] = id строки
arr = $(this).attr('class').split( " " );
//проверяем какая была нажата клавиша и если была нажата клавиша Enter (код 13)
   if(event.which == 13)
   {
	   
//получаем наименование таблицы, в которую будем вносить изменения
var table = $('user1').attr('id');
//выполняем ajax запрос методом POST
 $.ajax({ type: "POST",
//в файл update_cell.php
 url:"update_cell.php",
//создаём строку для отправки запроса
//value = введенное значение
//id = номер строки
//field = название столбца
//table = собственно название таблицы"
 data:"value="+$('.ajax input').val()+"&field="+arr[1]+"&id="+arr[2] ,
		 
//при удачном выполнении скрипта, производим действия
 success: function(data){
//находим input внутри элемента с классом ajax и вставляем вместо input его значение
// res=data;
	 alert(data);
	 $('.ajax').html($('.ajax input').val());
	 
//удаялем класс ajax
 $('.ajax').removeClass('ajax');
 }
		//return res;
		});
 }});
		
$(document).on('blur', '#editbox', function(){
$('.ajax').html($('.ajax input').val());
$('.ajax').removeClass('ajax');
});	
	
	</script>	
				</div>
		 