<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*Get JSON Top 10 File*/
$json_path = "samples/top10.json";
$error = "";
if(file_exists($json_path)){
$json = file_get_contents($json_path);
$top = json_decode($json, true);
} else {
  $error = "File not found.";
}
/*Read JSON Top 10 File*/
$iterator = 1;
foreach ((array)$top as $key => $item){ 
    ?>

     <div class="container" style="border: 1px solid black; border-radius: 5px;">  
        <div class=" movie-view-image"> 
            <br>
            <img src="<?php echo $item['info']['image_url'] ?>" width="800" height="600" alt="sample"/>
            <br>
        </div>
        <div class="movie-view-description" > 
            <br>
            <ul>
                <li><h1><?php echo $iterator;?>. <?php echo $item['title']; ?></h1></li>
                <li><p><?php echo $item['year']; ?></p></li>
                <li><p><?php echo implode(" , ", $item['info']['actors']); ?></p></li>
                <li><p><?php echo implode(" , ", $item['info']['genres']); ?></p></li>
                <li><p><?php echo $item['info']['plot']; ?></p></li>
            </ul>
            <br>
        </div>
        <div class="movie-view-rating"> 
            <br>
            <h3>Rating: <?php if($item['info']['rating'] == NULL) {
                echo 'Not rated.';
            }else{
                echo $item['info']['rating']; 
            }
            $iterator++;?></h3>
            <br>
            <hr>

        </div>
    </div>
 <br> 

<?php } ?>
   
   <div class="container">
       <?php 
       if ($error != ""){
           echo($top); 
       } else {
       echo $error;    
       }
               
               ?>
   </div>
