<script>
$(document).ready(function(){
    $("submit").click(function(){
        $("#movie-view").fadeIn("slow");
      
    });
});
</script>

<?php 
$year = "2015";
$genre = "Comedy";
$plot = "Leonard Hofstadter and Sheldon Cooper are both brilliant physicists working at Cal Tech in Pasadena, California. They are colleagues, best friends, and roommates, although in all capacities their relationship is always tested primarily by Sheldon's regimented, deeply eccentric, and non-conventional ways. They are also friends with their Cal Tech colleagues mechanical engineer Howard Wolowitz and astrophysicist Rajesh Koothrappali. The foursome spend their time working on their individual work projects, playing video games, watching science-fiction movies, or reading comic books. As they are self-professed nerds, all have little or no luck with women. When Penny, a pretty woman and an aspiring actress from Omaha, moves into the apartment across the hall from Leonard and Sheldon's, Leonard has another aspiration in life, namely to get Penny to be his girlfriend.";
$rating = "9.6";
?>

<!--SEARCH-->
<div class="container-fluid text-center">
            <div class="page-header">
            <h2>Rate your favourite Series</h2><br>
            </div>
        <form action="" method="post">
            <input class="input-lg" style="width: 40%" name="title" type="text" placeholder="Enter your title here...">
            <button name="submit" type="submit" class="btn btn-success">Search</button>
        </form>
   </div>

<!--VALIDATE INPUT-->
<?php      
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['title'] != ""){
     $title = $_POST['title']; ?>
        <br><br>
        <div class="container">  
             <div class=" movie-view-image"> 
                 <br>
                 <img src="../../samples/img/sample.jpg" width="800" height="600" alt="sample"/>
                 <br>
             </div>
                   <div class="movie-view-description" > 
                 <br>
                 <ul>
                <li><h1><?php echo $title ?></h1></li>
                <li><p><?php echo $year ?></p></li>
                <li><p><?php echo $genre ?></p></li>
                <li><p><?php echo $plot ?></p></li>
                 </ul>
                 <br>
             </div>
             <div class="movie-view-rating"> 
                 <br>
                 <h1>Rating: <b><?php echo $rating ?></b></h1>
                 <br>
                 <hr>
                  <form action="" method="post">
                      <input class="input-sm" style="width: 10%" name="rating" type="text"/>/10
                      <br><br>
                  <button name="submit" type="submit" class="btn btn-success">Submit my Rating</button>
        </form>
             </div>
        </div>
 <?php
} else { ?>
        <div class="container text-center">
            <br>
            <h2><b>Please enter a valid title of a series you like</b></h2>
            <br>
 <?php }} ?>

            
            <!-- TO - DO:
                Query DB
                Autocompleten
                Show Movie Title Overview
            -->