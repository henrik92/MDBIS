<!-- NAVIGATION BAR -->
<?php 
if(!isset($_GET['site'])){
    $_GET['site'] = "start";
}
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
           <a class="navbar-brand active" href="index.php?site=start">WhatToWatch</a>
        </div>
        <ul class="nav navbar-nav">
            <li
                 <?php if($_GET['site']=='start'){
                    echo 'class="active"';
                 }?>
                ><a href="index.php?site=start">Home</a></li>
            <li
                 <?php if($_GET['site']=='search'){
                    echo 'class="active"';
                 }?>
                ><a href="index.php?site=search">Rate a Movie</a></li>
            <li
                <?php if($_GET['site']=='collection'){
                    echo 'class="active"';
                 }?>
                ><a href="index.php?site=collection">Moviecollection</a></li>
            <li
                 <?php if($_GET['site']=='info'){
                    echo 'class="active"';
                 }?>
                ><a href="index.php?site=info">About the project</a></li>
        </ul>
    </div>
</nav>