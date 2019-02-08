<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, intial-scale=1">
  <title> Adminstrator Page </title>

  <link rel="stylesheet" href="form/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="form/css/fontawesome.min.css"/>
  <link rel="stylesheet" href="form/css/all.css"/>
  <link rel="stylesheet" href="form/css/form.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <style>
  table.center {
    max-width: 500px;
    font-family: 'Amiri', serif;
    border-collapse: collapse;
   float: right;
   padding-left: 25px;
   margin: 20px;
   width: 500px;

  }

  td, th {
    border: 1px solid #dddddd;
text-align: center;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  </style>
</head>

<body>
  <form class="contact-form "  method="POST">

<?php

include ('dbconnection.php');
session_start();
//print_r($_SESSION);

//echo "Congratulations. Now you r reserved";
/*echo $_SESSION["name"];
echo $_SESSION["age"];
echo $_SESSION["doctor"];
*/

$p_id=$_GET['pid'];
$date1= $_GET['date'];
$date2= $_GET['date1'];

$d_id= $_GET['d_id'];
$t_id= $_GET['tid'];
$D_name= $_GET['D_name'];
$slot =$_GET['slot'];
if ($_SESSION['name']!=""){
$rquery="INSERT INTO reserved (d_id, slotid, day) VALUES ('$d_id','$t_id','$date2')";
if ($conn->query($rquery) === TRUE) {
  echo "<table class='center' >";

  echo " <tr>";
  echo " <td  colspan='4'>تم تسجيل حجزك بنجاح بالتفاصيل التالية.</td>";

echo  "</tr>";
echo "<tr>";
echo "<td> IDN</td>";

echo "<td> الطبيب</td>";
echo "<td> الساعة</td>";
echo "<td> اليوم</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td> $d_id</td>";

  echo "<td> $D_name</td>";
  echo "<td> $slot</td>";
  echo "<td> $date1</td>";
  echo "</tr>";

  echo "</table >";


} else {
  echo "Error: " . $rquery . "<br>" . $conn->error;
}
}
//mysql_query("INSERT INTO reservations(t_id,p_id,date)value('$p_id','$d_id','$date')")OR die(mysql_error()) ;
//header("refresh:15;url=main.php");
session_unset();
session_destroy();

?>
<input class="btn btn-success btn-block form-control"  style="max-width:500px;float:right;"name="mainmenu" type="submit" value="العودة إلى الصفحة الرئيسية" formaction="patient.php" />

</body>
</html>
