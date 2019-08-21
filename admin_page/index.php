<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php require_once("../includes/head2.php");?>
    </head>
    <body>
		<?php require_once("../includes/dbconnect.php");
		 require_once("../includes/header2.php");
		?>
		<?php
if(!isset($_SESSION['firstname']) && !isset($_SESSION['password'])){
	
  
   echo '<h3>Ты не залогинился</h3>';

			}else{ ?>
		<?php
		$idu=$_SESSION['id'];
		
		//require_once("../../includes/header.php");
		?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

        
                                                            


        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
	$id = $_SESSION['id'];
	
	
	//$id = $_SESSION['id'];     SELECT user1.username,user_group.name FROM `user1`,`user_group` WHERE (user1.user_group=user_group.id) and (user1.id=1)
	$zapr_user = $mysqli->query("SELECT user1.username,user1.firstname,user1.surname,user1.middlename,user1.email,user_group.name,user1.qty FROM user1,user_group WHERE (user1.user_group=user_group.id) AND (user1.id= $id)");
				
				while($row = mysqli_fetch_row($zapr_user))
				{
					$username = $row['0'];
					$firstname = $row['1'];				
    				$surname = $row['2'];
					$middlename = $row['3'];
					$email = $row['4'];
					$group = $row['5'];
					$qty = $row['6'];
				}?>

    <div class="container">
  <div class="row">
    <div class="col-md-12 content-area">
<div class="panel panel-default">
<div class="panel-body">
	<div class="container-fluid" >
		<div class="row">
			
		<div class="alert alert-info " role="alert">	
	<?php		
			echo '<h4 class="alert-heading" align="center" ><b>'. $_SESSION['firstname'].'</b>, приветствую тебя в личном кабинете!</h4>';
		?>	

  <p class="m-b-2">Ты можешь посмотреть заявки</p>
			 
  <p class="m-b-2">Я верю, что у тебя всё получится и из этого выйдет забавная штука.</p>
</div>
			
		
		</div>
	</div>
	
	<div>
	

	
	</div>
	
	
</div>
</div>

</div>
</div>
</div><?php }?>
		<?php require_once("../includes/footer.php")?>
    </body>
</html>