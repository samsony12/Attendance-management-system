<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<title>View Report</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/check.css">

</head>
</html>

<?php

if(isset($_POST['submit2']))
{
#$date=mysql_real_escape_string($_POST['date']);
#$branch=mysql_real_escape_string($_POST['branch']);
#$faculty=mysql_real_escape_string($_POST['fac']);
$branch = $_POST['branch'];
$sem = $_POST['sem'];
$sec = $_POST['sec'];

$sub = $_POST['sub'];
$hobb= $_POST['c1'];
$fid= $_POST['fid'];
if(empty($hobb)) 
    {
        echo("<p>You didn't select any any Roll no.</p>\n");
    } 
    else 
    {
       $N = count($hobb);
        echo("<p>You selected $N Roll no.(s): ");
        for($i=0; $i < $N; $i++)
        {
            $var1=$hobb[$i];
            include ('config.php');
            $table = "INSERT INTO `attendance`(`f_id`,`sem`, `branch`, `section`, `sub_code`, `enroll_no`, `absent/present`, `date`) ".
                     "VALUES ('$fid','$sem', '$branch', '$sec','$sub', '$var1', 'Present', current_date)";
            mysql_query($table) or die(mysql_error());
            $inserted_fid = mysql_insert_id();
            mysql_close();  
        }

        echo "successfully uploaded!..";
      }
}
else
 {
echo "error please check ur code";
}