<?php
session_start();
$d_id= $_GET['D_id'];
$D_name= $_GET['D_name'];
include ('dbconnection.php');



 ?>


 <! DOCTYPE html>
 <html lang="ar">
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
       <script>
       $( function() {
         $( "#datepicker" ).datepicker();
       } );
       </script>
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
         padding: 20px;
         border: 1px solid #dddddd;
         text-align: center;
         padding: 8px;
       }

       tr:nth-child(even) {
         padding: 20px;
         background-color: #dddddd;
       }

       </style>

   </head>
     <body>

<form class="contact-form "  method="POST">
 <input class="form-control "style="max-width: 500px; float:right;" name="date"   type="text" id="datepicker" placeholder="اختر تاريخ اليوم">
 <input class="btn btn-success btn-block form-control"  style="max-width:500px;float:right;"name="pickdoctor" type="submit" value="عرض المواعيد المتاحة لهذا الطبيب" />

<?php

if ($_POST['pickdoctor']){

 $date= $_POST['date'];
 $date1=strtotime($date);

 $tquery="select timeslot.id,timeslot.slot,reserved.slotid
 FROM timeslot
 LEFT JOIN reserved ON
 timeslot.id=reserved.slotid
 AND reserved.d_id=$d_id
 AND reserved.day=$date1
  ORDER BY `timeslot`.`id` ASC
  ;";
$tresult= $conn->query($tquery);
echo "<table class='center' >";

while ($res=mysqli_fetch_array($tresult)){
echo " <tr>";
if ($res['slotid']==Null){
echo "<td ><a  href='toreserv.php?d_id=".$d_id."&D_name=".$D_name."&date1=".$date1."&date=".$date."&pid=5&tid=".$res['id']."&slot=".$res['slot']."'><h2><font color='#339966'>هذا الموعد متاح  : ".$res['slot']."</font><br /></h2></a></td>";
}
else{
echo "<td ><h2><font color='#FF0000'>هذا الموعد غير متاح : ".$res['slot']."</font><br /></h2></td>";
}
echo "</tr>";
}
echo "</table >";

}

?>
</form>
  </body>
 </html>
