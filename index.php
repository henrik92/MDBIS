<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>WhatToWatch</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <!-- BOOTSTRAP CDN -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<link rel="stylesheet" type="text/css" href="css/Stylesheet.css">
    </head>
    <body>
        <?php include_once 'src/view/nav.php';
        
$incFile = "src/view/search.php"; 

if (isset($_GET["site"])) 
{ 
  $site = $_GET["site"]; 
  if (strlen($site) != 0) 
  { 
    if ($site == "top10")  
      $incFile = "src/view/top10.php"; 

    if ($site == "all")  
      $incFile = "src/view/all.php"; 
       
    if ($site == "newTitle")  
      $incFile = "src/view/newTitle.php";   
  } 
}       
                include $incFile;
        
        ?>
        
      
       
    </body>
</html>
