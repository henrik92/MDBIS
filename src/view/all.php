<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$total_movies = 21134;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6" style="text-align: left">
            <h4>There are <b><?php echo $total_movies; ?></b> titles in our Collection.</h4>
        </div>
        <div class="col-sm-6 text-center" style="text-align: right">
            Sort by: 
                <select name="sort">
                    <option selected value="rating_desc">Rating high..low</option>
                    <option value="rating_asc">Rating low..high</option>
                    <option value="alphabetical">Alphabetical A..Z</option>
                    <option value="year_desc">Year high..low</option>
                    <option value="year_asc">Year low..high</option>
                </select>
            <button class="btn btn-sm btn-success" name="filter">Change the order</button>
        </div>
    </div>   
</div>
<hr>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-3"><br>Movie 1<br></div>
        <div class="col-sm-3"><br>Movie 2<br></div>
        <div class="col-sm-3"><br>Movie 3<br></div>
        <div class="col-sm-3"><br>Movie 4<br></div>
    </div>
    <div class="row">
        <div class="col-sm-3"><br>Movie 5<br></div>
        <div class="col-sm-3"><br>Movie 6<br></div>
        <div class="col-sm-3"><br>Movie 7<br></div>
        <div class="col-sm-3"><br>Movie 8<br></div>
    </div>
</div>