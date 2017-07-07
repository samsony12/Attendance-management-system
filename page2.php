<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['user']))
{
	header("Location:takenview.php");
}
$res=mysql_query("SELECT * FROM `faculty_info` WHERE `f_id` =".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$fid = $userRow['f_id'];


?>
<?php 
					
					if(isset($_POST['submit1']))
{   $fid = mysql_real_escape_string($_POST['fid']);
	$sub_code = mysql_real_escape_string($_POST['sub_code']);
	$sem = mysql_real_escape_string($_POST['sem']);
	$branch = mysql_real_escape_string($_POST['branch']);
	$sec = mysql_real_escape_string($_POST['sec']);
	header("Location: attend.php");
	}
	?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Select detail</title>
  
  
  		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      <link rel="stylesheet" href="bootstrap/css/style.css">

  
  <style type="text/css">
  .auto-style1 {
	  text-align: center;
  }
  </style>

  
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
   
  </div><!-- /.container-fluid -->
  </div>
</nav>

  <body>
  <table style="width: 818px">
  <form action ="attend.php" method = "GET">
	<div class="login" style="width: 466px">
	
		<div class="login-screen">
			<div class="app-title">
				
				<h1 style="font-size: large" >Please Select The Details</h1><br>
			</div>

			<div class="login-form">
				 <span>Subject Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
								 <select name="sub_code" style="width: 240px;height: 34px;overflow: hidden;background: url(new_arrow.png) no-repeat right #ddd;border: 1px solid #ccc;">
        <option>Select Option</option>
        <?php 
								$query=mysql_query("SELECT * FROM `faculty_info` where `f_id` = $fid");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['sub_code'];?>"> <?php echo $row['sub_code'];?> </option>
									<?php } ?>

        </select>
        <br>
        <br>
         <span>Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
         <select name="sem" style="width: 240px;height: 34px;overflow: hidden;background: url(new_arrow.png) no-repeat right #ddd;border: 1px solid #ccc;" name="sem">
        <option>Select Option</option>
         <?php 
								$query=mysql_query("SELECT * FROM `faculty_info` where `f_id` = $fid GROUP BY sem");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['sem'];?>"> <?php echo $row['sem'];?> </option>
									<?php } ?>

        
        </select><br><br>
         		<span>&nbsp;Branch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
         		<select name="branch" style="width: 240px;height: 34px;overflow: hidden;background: url(new_arrow.png) no-repeat right #ddd;border: 1px solid #ccc;" name="branch">
        <option>Select Option</option>
         <?php 
								$query=mysql_query("SELECT * FROM `faculty_info` where `f_id` = $fid GROUP BY branch");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['branch'];?>"> <?php echo $row['branch'];?> </option>
									<?php } ?>

        
        </select><br><br>
         <span>Section&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><select name="section" required style="width: 240px;height: 34px;overflow: hidden;background: url(new_arrow.png) no-repeat right #ddd;border: 1px solid #ccc;">
        <option>Select Option        
        </option>
        <?php 
								$query=mysql_query("SELECT * FROM `faculty_info` where `f_id` = $fid");
								while($row=mysql_fetch_array($query))
								 { ?>
									<option value="<?php echo $row['section'];?>"> <?php echo $row['section'];?> </option>
									<?php } ?>

        
        </select><br><br>
					
					<input type="submit" class="btn btn-primary btn-large btn-block" name="submit1" style="color:#fff; " ><br>
					<input type="hidden" name="fid" value="<?php echo $fid ?>">				
			</div>
		</div>
	</div>
</form>

  
	</table>  
	</body>
</body>
</html>