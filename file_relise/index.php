
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SoftGroup</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="shortcut icon" href="img/soft_favicon.ico" type="image/vnd.microsoft.icon">
    <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.1.1.js" charset="utf-8"></script>
</head>

<body>
<div class="container">
<?php require_once("block/head.php");?>
    <div class="row">
    <?php require_once("block/left-menu.php");?>
      <br>
      <?php 

      if($_GET==NULL)
      {
        if($_POST==NULL){
          require_once('layout/home.php');
        }else
        {
         require_once('layout/'.$action.'.php'); 
        }
      } 
      elseif (isset($_GET['action']))
      {
        if(file_exists ( 'layout/'.$_GET['action'].'.php')){
          $action=$_GET['action'];
          require_once('layout/'.$_GET['action'].'.php');
        }else
        {
        require_once('layout/404_error.php');
        }
      }else
        {
        require_once('layout/404_error.php');
        }
      ?>
  </div>
   <?php
    require_once("block/futer.php");?>
</div>
    <script type="text/javascript" src="js/bootstrap.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/script.js" charset="utf-8"></script>
         <?php 
        echo "<script type='text/javascript'>";
        echo "jQuery('li').removeClass('active');";
        echo "jQuery(".$_GET['action'].").addClass('active');";
        echo "</script>";
      ?>
</body>
</html>											