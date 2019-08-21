<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
	 <?php require_once("includes/head2.php");?>
		  <script>
function ajax2(){
var req= new XMLHttpRequest();

req.onreadystatechange=function(){
if(req.readyState== 4 && req.status == 200){

document.getElementById('articles').innerHTML=req.responseText;
}	
}
req.open('GET','/client/knowledge/articles.php',true);
req.send();

}
setInterval(function(){ajax2();},1000);
</script>
    </head>
    <body>
		<?php include("includes/header2.php");
		require_once("includes/dbconnect.php");
		 
		?>
  
<?php
	
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		 echo '<h3>Вы не авторизовались</h3>';
			}else{
		?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

        <?php 
				
					?>
                                                            


        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
		
		
	$zapr_user = $mysqli->query("SELECT * FROM `user1` where `id`= '$id1'", MYSQLI_USE_RESULT);
				
				while($row = mysqli_fetch_assoc($zapr_user))
				{
					
					$firstname = $row['firstname'];				
    				$surname = $row['surname'];
					$middlename = $row['middlename'];
					$email = $row['email'];
				}
	
	?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7" id="ticket-area">

                                                

                                                        <h3 class="home-label">Создать заявку</h3> 

                                                            Добро пожаловать в центр поддержки пользователей                            
                            <div class="panel panel-default">
<div class="panel-body">                
<form action="send_mess.php" class="form-horizontal" enctype="multipart/form-data" method="post" >
	
                                                                                                                           
        <div class="form-group">
                <label for="p-in" class="col-md-3 label-heading">Тема сообщения</label>
                <div class="col-md-9 ui-front">
                    <input type="text" class="form-control" id='article-title' name="subject" value="" required>
                </div>
        </div>
                    <div class="form-group">
                    <label for="p-in" class="col-md-3 label-heading">Ваше имя</label>
                    <div class="col-md-9">
                        <input type="hidden" class="form-control" name="autor" value="<?php echo $id  ?>">
						<input type="text" class="form-control" readonly name="" value="" placeholder="<?php echo $firstname ?>">
                    </div>
            </div>
                <div class="form-group">
                <label for="p-in" class="col-md-3 label-heading">Приоритет</label>
                <div class="col-md-9 ui-front">
                    <select name="priority" class="form-control">
                    <option value="1">Низкий</option>
                    <option value="2">Средний</option>
                    <option value="3">Высокий</option>
                    <option value="4">Беда!</option>
                    </select>
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-3 label-heading">Категория проблемы</label>
                <div class="col-md-9 ui-front">
                    <select name="problem" id="parent_cat" class="form-control">
                        <option value="0">Выберите ... </option>
                                                    <option value="1">Интернет</option>
                        							<option value="2">Принтер</option>                            
													<option value="3">Компьютер</option>
                                                    <option value="4">Не понимаю что случилось</option>
                                            </select>
                    <div id="sub_cats"></div>
                </div>
        </div>
        <div class="form-group">
            <label for="p-in" class="col-md-3 label-heading"></label>
                <div class="col-md-9 ui-front help-block" id='cat-desc'>
                    
                </div>
        </div>
        <div class="form-group">
                <div class="col-md-12 ui-front">
                    <textarea name="mess" class="md-textarea form-control" style="height: 200px" id="ticket-body" required></textarea>
                </div>
        </div>
       
                                         
                                    <div id="custom_fields_extra"></div>
        <hr>
               
                        <input type="submit" class="btn btn-primary form-control" name="send" value="Отправить заявку" />
        </form>
	
	
	
	
	
	
        </div>
						
								<?php
				if(isset($_SESSION["serever_message"])){

					echo '<div class="alert alert-info">'.$_SESSION["serever_message"].'</div>';

					unset($_SESSION["serever_message"]);
				}
								?>
</div>
    
                        </div>
                        <div class="col-md-4 col-md-offset-1" id="knowledge-area">
                             
<div class="list-group">
    <a href="#" class="list-group-item active" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="list-group-item-heading">Полезные статьи</h4>
  </a>
	 <div id="articles"></div>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="list-group-item-heading">Публичные обращения</h4>
  </a>
    
  <a href="#" class="list-group-item" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="list-group-item-heading">Как обновить систему?</h4>
    <p class="list-group-item-text">Честно говоря я сам не понимаю.</p>
  </a>
</div>


<div class="list-group">
    <a href="#" class="list-group-item active" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="list-group-item-heading">Часто задаваемые вопросы</h4>
  </a>
    
  <div class="list-group-item" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="panel-title faq-title-fp">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
        Сколько стоит данное ПО?        </a>
      </h4>
    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
      <div class="panel-body">
        <p>Один диплом, несколько месяцев работы.</p>
      </div>
    </div>
  </div>
    
  <div class="list-group-item" style="word-wrap:break-word; overflow: visible !important;">
    <h4 class="panel-title faq-title-fp">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
        Какая версия php используется?</a>
      </h4>
    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
      <div class="panel-body">
        <p>PHP 7.3.1</p>
      </div>
    </div>
  </div>
    
  
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php } ?>

<?php require_once("includes/footer.php")?>
    </body>
</html>