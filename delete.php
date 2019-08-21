<?php 
session_start();

	require_once("includes/dbconnect.php");
$action = $_REQUEST['act'];
$id = $_REQUEST['id'];
$st = $_SESSION['12st'];
switch ($action) {
    case 'deleteuser':
        $result = $mysqli->query("DELETE FROM `user1` WHERE `id`='" . $id . "' LIMIT 1");
        if ($result) {
            echo "Запись успешно удалена";
                exit('<meta http-equiv="refresh" content="0; url=users.php" />');
        } else {
           printf("MySQL Query Error! : %s\n", $db->error);
        }
        break;
    case 'deletemess':
      
		
        $result = $mysqli->query("DELETE FROM `ticket` WHERE `id`='" . $id . "' LIMIT 1");
        if ($result) {
            echo "Запись успешно удалена";
                exit('<meta http-equiv="refresh" content="0; url=client/view_ticket/" />');
        } else {
           printf("MySQL Query Error! : %s\n", $db->error);
        }
        break;
		
		case 'deletemessch':
      
        $result = $mysqli->query("DELETE FROM `chat_mess` WHERE `id`='" . $id . "' LIMIT 1");
        if ($result) {
            echo "Запись успешно удалена";
            redirect_to($message, 'client/view_ticket/index.php?st= '.$st.'');    
			
			//exit('<meta http-equiv="refresh" content="0  url=client/view_ticket/index.php?st=\'".$st."\' />');
        } else {
           printf("MySQLI Query Error! : %s\n", $db->error);
        }
        break;
		
    default:
        break;
}
	?>