<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Load Top10 JSON File */
for ($x = 1; $x <= 10; $x++) {
    ?>

    <div class="container" style="border: 1px solid black; border-radius: 5px;">  
        <div class=" movie-view-image"> 
            <br>
            <img src="../../samples/img/sample.jpg" width="800" height="600" alt="sample"/>
            <br>
        </div>
        <div class="movie-view-description" > 
            <br>
            <ul>
                <li><h1><?php echo $x ?>. Title</h1></li>
                <li><p>Year</p></li>
                <li><p>Genre</p></li>
                <li><p>Plot Information</p></li>
            </ul>
            <br>
        </div>
        <div class="movie-view-rating"> 
            <br>
            <<h3>Rating: <b>9</b> Stars</h3>
            <br>
            <hr>

        </div>
    </div>
    <br>

<?php } ?>