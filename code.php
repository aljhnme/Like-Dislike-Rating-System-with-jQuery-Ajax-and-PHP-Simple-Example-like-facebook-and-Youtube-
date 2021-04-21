<?php

 $connect= new PDO('mysql:host=localhost;dbname=ex_php','root','');

 if ($_POST['action'] == "insert_data") 
 {
 	 $query='INSERT INTO `text_user`(`text`, `name_user`) 
 	        VALUES ("'.$_POST['text_user'].'" , "'.$_POST['name_user'].'")';


 	 $stm=$connect->prepare($query);
 	 if ($stm->execute()) 
 	 {
 	  echo'<div class="alert alert-success" role="alert">Your listing has been successful</div>';
 	 }  
 }
 if ($_POST['action'] == "fetch_data") 
 {
 	 $query="SELECT * FROM `text_user`";

 	 $stm=$connect->prepare($query);
 	 $stm->execute();
 	 $fetch_data_user=$stm->FetchAll();

 	 foreach ($fetch_data_user as $row) 
 	 {
 	  ?>
    <div class="panel">
    <div class="panel-body">
    <div class="media-block">
      <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="img_user.png"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline">
           <?php echo $row['name_user'];?></a>
        </div>
        <p>
        	<?php echo $row['text'];?>
        </p>
         <div class="pad-ver">
           <div class="btn-group">

            <a id="click_unlike_like" 
             class="btn btn-sm btn-default  btn-hover-success add_style<?php echo$row['id_text']?>" data-type_click="like" 
               data-id_text="<?php echo $row['id_text'];?>">
              <i class="fa fa-thumbs-up"></i>
              <input type="hidden" id="ch_like<?php echo $row['id_text'];?>">
            </a>

          <div class="btn count_like<?php echo $row['id_text']?>">0</div>

            <a  id="click_unlike_like" 
            class="btn btn-sm btn-default btn-hover-success add_styleun<?php echo$row['id_text']?>" data-type_click="unlike"
              data-id_text="<?php echo$row['id_text'];?>">
              <i class="fa fa-thumbs-down"></i>
              <input type="hidden"  id="ch_unlike<?php echo $row['id_text'];?>">
            </a>

           <div class="btn count_unlike<?php echo $row['id_text'];?>">0</div>
            
           </div>
          </div>
         <hr>
        <div>
       </div>
      </div>
     </div>
    </div>
   </div>
 	  <?php
 	 }
 }

?>