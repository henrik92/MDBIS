<?php
$site = $_GET["site"];
?>  

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?site=rating">WhatToWatch</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php?site=rating">Rating</a></li>
            <li><a href="index.php?site=top10">Top 10</a></li>
            <li><a href="index.php?site=all">All Movies</a></li>
            <li><a href="index.php?site=info">Info</a></li>
        </ul>
    </div>
</nav>