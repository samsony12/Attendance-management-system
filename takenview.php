<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['user']))
{
	header("Location:index.php");
}
$res=mysql_query("SELECT * FROM `faculty_info` WHERE `f_id` =".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$fid = $userRow['f_id'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="bootstrap/css/third.css"/>
<title>Take/View</title>

</head>

<body style="background-color:#3498DB">
<nav class="navbar navbar-default">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <span class="glyphicon glyphicon-apple"></span>  
      </a>
    </div>

 
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AMS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
   
  </div><!-- /.container-fluid -->
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-5">
        	<a href="page2.php"><div class="img-circular" style="margin-top: 100px;margin-bottom:100px;margin-left:90px">
        		
        	</div>        
            </a>
            <div class="col-md-5" style="left: 550px; top: -420px; width: 252px; height: 60px">
            	<a href="viewmenu.php"><div class="img-circular1" style="margin-top: 100px;margin-bottom:100px;">
           		
           		</div>
           		</a>     
       		</div>
        </div>
    </div>
    	 <div class="row">
        	<div class="col-md-5" style="left: 70px; top: -115px">
        	<span><h2>Take Attendance</h2></span>
 
        	</div>
        	<div class="col-md-5" style="left: 160px; top: -115px;">
        	<span><h2>View Attendance</h2></span>
        	</div>
    	</div>
</div>


</body>

</html>
