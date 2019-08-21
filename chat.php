<?php 


require_once("includes/dbconnect.php");
?>
<body>
<?php


/*$query="SELECT DISTINCT chat.id_ticket,chat.id_autor,chat.id_executor, ticket.id,ticket.message,user1.firstname,user1_1.firstname,user1.id,chat_mess.mess,chat_mess.id_user FROM chat,chat_mess,ticket,`user1` AS user1_1, user1 WHERE (chat.id_ticket=ticket.id) AND (user1.id = chat.id_autor) AND (user1_1.id = chat.id_executor)";

	$query="SELECT DISTINCT chat.id_ticket,chat.id_autor,chat.id_executor, ticket.id,ticket.message,user1.firstname,user1_1.firstname,user1_2.firstname,user1_3.firstname,user1.id,chat_mess.mess,chat_mess.id_user FROM chat,chat_mess,ticket,`user1` AS user1_1,`user1` AS user1_2,`user1` as user1_3, user1 WHERE (chat.id_ticket=ticket.id) AND (user1.id = chat.id_autor) AND (user1_1.id = chat.id_executor) AND (user1_2.id = chat_mess.id_user) AND (user1_3.id = chat_mess.id_user)";
	<div id="chat_data">
<span style="color:green;">'.$row['6'].' </span>:

<span style="color:brown;">'.$row['9'].'</span>
</div>*/
	
	$query = "SELECT chat_mess.id_user,chat_mess.mess,chat.id_ticket,ticket.id,ticket.message,user1.firstname FROM chat_mess,chat,ticket,user1 WHERE (user1.id=chat_mess.id_user) AND (chat.id_ticket=ticket.id)";
if ($tabl = $mysqli->query($query));		
while ($row = $tabl->fetch_row()){
echo '	
<body>
<div id="chat"></div>
<div id="chat_data">
<span style="color:green;">'.$row['5'].' </span>:
	
<span style="color:brown;">'.$row['1'].'</span>

</div>

	
';}?>
</body>
