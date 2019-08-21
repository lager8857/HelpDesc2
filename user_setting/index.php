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

<div class="clearfix">
<span class="plan-title">Настройки</span>

<!--<div class="pull-right">
<a href="/user_setting/change_password/" class="btn btn-primary btn-sm">Изменить пароль</a>
</div>Допилить смену пароля!--> 
</div>


<p>Вы можете изменить данные тут.</p>

<hr>

<form action="/user_send.php" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                                                                                <input type="hidden" name="csrf_test_name" value="d6aa1a6f3af1423fccec308918da0e4a" />
		<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Логин</label>
	    <div class="col-sm-10">
	      <p><a href="#"><?php echo $username ?></a></p>
	    </div>
	</div>
	<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Уровень доступа:</label>
	    <div class="col-sm-10">
	      <p><a href="#"><?php echo $group ?></a></p>
	    </div>
	</div>
			
		<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Аватарка</label>
	    <div class="col-sm-10">
	    <p><img src="http://support.patchesoft.com//uploads/default.png" /></p>
	    	     	<!--<input type="file" name="userfile" /> Закончу когда закончу^_^ --> 
	     	    </div>
	</div>
    <div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
	    </div>
	</div>
	<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Фамилия</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="surname" value="<?php echo $surname ?>">
	    </div>
	</div>
	<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Имя</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="firstname" value="<?php echo $firstname ?>">
	    </div>
	</div>
	
	<div class="form-group">
	    <label for="inputEmail3" style="padding-top: 0px !important" class="col-sm-2 control-label">Отчество</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="middlename" value="<?php echo $middlename ?>">
	    </div>
	</div>
	
		
	 <input type="submit" name="send" value="Изменить данные" class="btn btn-primary form-control" />
</form></div>
</div>

</div>
</div>
</div><?php }?>
		<?php require_once("../includes/footer.php")?>
    </body>
</html>