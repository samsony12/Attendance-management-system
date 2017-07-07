<?php
session_start();
include_once 'config.php';

if(isset($_SESSION['user'])!="")
{
	header("");
}

if(isset($_POST['submit']))
{
	$email = mysql_real_escape_string($_POST['username']);
	$upass = mysql_real_escape_string($_POST['password']);
	$res=mysql_query("SELECT * FROM `faculty` WHERE `email_id` = '$email'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==($upass))
	{
		$_SESSION['user'] = $row['f_id'];
		header("Location: takenview.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
        <?php
	}
	
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>AMS</title>
  
  
  		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="bootstrap/css/style.css">

  
</head>

<body>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">About <span class="sr-only">(current)</span></a></li>
        <li><a href="../../Desktop/vedansh/html/test.html">Help and support</a></li>
       
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>

  <body>
  <form action ="" method = "post">
	<div class="login">
	
		<div class="login-screen">
			<div class="app-title">
				<img src="image/p1.jpg" alt="SIRTS" height="114" width="107">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
				<input type="text" class="login-field" name="username" value="" placeholder="username" id="login-name">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" name="password" value="" placeholder="password" id="login-pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
				<input type="submit" class="btn btn-primary btn-large btn-block" name="submit" >
				
				
			</div>
		</div>
	</div>
</form>
</body>
  
  
</body>
</html>
