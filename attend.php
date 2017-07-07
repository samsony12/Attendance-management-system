<?php
	include('config.php');
$sub = $_GET['sub_code'];
	$sem = $_GET['sem'];
	$branch = $_GET['branch'];
	$sec = $_GET['section'];
	$fid=$_GET['fid'];

?>
	


<!DOCTYPE html>
<html>
<head>
<meta  charset=utf-8 http-equiv="Content-Type">
<title>Attendance</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/attend.css">

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

     </div><!-- /.container-fluid -->
  </div>
</nav>

<div class="container">
    <div class="row">
       
       
        <div class="row">
        <div class="col-md-4"><br/>
        	<div class="input-group" style="float:left;margin-top:10px">
  				<span class="input-group-addon" id="sem" style="background-color:#337ab7;color:#fff">Semester :- <?php echo $sem ?> </span>
				
			</div>

        
        </div>
        <div class="col-md-4"><br/>
        	<div class="input-group" style="float:left;margin-top:10px">
  				<span class="input-group-addon" id="branch" style="background-color:#337ab7;color:#fff">Branch :- <?php echo $branch ?> </span>
 				 
			</div>

        
        </div>
 		<div class="col-md-4"><br/>
        	<div class="input-group" style="float:left;margin-top:10px">
  				<span class="input-group-addon" id="sec" style="background-color:#337ab7;color:#fff">Section :- <?php echo $sec ?> </span>
 				 
			</div>

        
        </div>


    	</div>
            
    	</div>
     <div class="row"><br/><br/>
        <div class="col-md-12">
        <table border="1px"  id="attendance" style="margin-left:50px;background-color:#fff">
        <thead>
			<tr>
			<td class="auto-style1"><strong>S.no</strong></td>
			<td class="auto-style1"><strong>Enrollment no.</strong></td>
			<td class="auto-style1"><strong>Absent/Present</strong></td></tr>
		</thead>
<?php
	if(isset($_GET['submit1']))
	
#ECHO $sem;
#echo $branch;
#echo $sec;
	
	{
	 $sql_query = ("SELECT student.enroll_no, student.student_name FROM student INNER JOIN faculty_info ON student.sem = faculty_info.sem AND student.branch = faculty_info.branch AND student.section = faculty_info.section WHERE student.section='$sec' AND student.branch = '$branch' AND student.sem = '$sem' GROUP BY student.enroll_no ORDER BY student.enroll_no DESC");
	 
	$result = mysql_query($sql_query) or die(mysql_error());
	$i=1;
	while($row = mysql_fetch_array($result))
	{
	
?>
        <tbody>
			<tr>
			<td class="auto-style1" style="width:25%">
			<strong><?php echo $i ?> </strong>
			</td>
			<td class="auto-style1" style="width:25%"><strong>
				<span class="auto-style16"><span class="auto-style13"><?php echo $row['enroll_no']; ?>
				</span></span></strong>
			</td>
			<td class="auto-style1" style="width:20%">

			<form action="check.php" method="post"><strong><span class="auto-style16"><span class="auto-style13">
			<input type="checkbox" name="c1[]" value="<?php echo $row['enroll_no']; ?>"/>
			</span></span></strong>
			</td>
			
			</tr> 
			<?php $i++ ?>

		</tbody><?php
		}
	}
?>

       		
        <tfoot>
        
        	<tr>
        	<td>
        	</td>
        	<td>
        	</td>
        	<td>
	        	<input type="hidden" name="branch" value="<?php echo $branch ?>"/>
	        	<input type="hidden" name="sem" value="<?php echo $sem ?>"/>
				<input type="hidden" name="sec" value="<?php echo $sec ?>"/>
        		<input type="hidden" name="sub" value="<?php echo $sub ?>"/>	
          		<input type="submit" name="submit2" class="btn btn-primary" style="margin-left:90px;vertical-align:middle;width:80px;" />
  		 		<input type="hidden" name="fid" value="<?php echo $fid ?>"/>	
  		 	</td>
  		 	</tr>
  		 </tfoot>
  		 </form>
  		 		  		
		</table> <br/>
		 
        
        </div>
    </div>
</div>




</body>

</html>