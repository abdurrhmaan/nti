<?php
session_start();
?>
<?php
      /*  include ('dbconnection.php');
        //select clinics from Database
        $Cquery="select * from spec";
        $Cresult = $conn->query($Cquery);
*/

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

      <style>
      table {
        max-width: 500px;
        font-family: 'Amiri', serif;
        border-collapse: collapse;
        width: 100%;
        float: right;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
      </style>

    <!--  <link rel="stylesheet" href="css/bootstrab.min.css"/> -->
  </head>
    <body>
  <form class="contact-form " action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <h2 align="right" style="color:DodgerBlue;">  أختر طبيبك</h2>

         <p align="right"  style="color:MediumSeaGreen;">الأن يمكنك أختيار التخصص الذي تريده. ثم تختار الطبيب الذي تريد العلاج معه.</p>
         <select  class="form-control " style="max-width: 350px; float:right;" name="spec"  >
               <option > اختر التخصص</option>
              <?php
                 while($row = mysqli_fetch_array($Cresult)) {
                     echo '<option value="'.$row['id'].'">'.$row['name']."</option>";}
                 ?>
         </select>

          <input class="btn btn-success btn-block form-control"  style="max-width:350px;float:right;"name="showdoctors" type="submit" value="عرض الأطباء بهذا التخصص" />

<?php
if ($_POST['showdoctors']){

  $specid= $_POST['spec'];

  $sql1="SELECT  *  FROM
                          doctor WHERE doctor.specid=".$specid.";" ;
  $bigresult = $conn->query($sql1);

echo "<table >";
echo"  <tr >";
  echo " <th>الطبيب</th>";



echo  "</tr>";
  while($row = mysqli_fetch_array($bigresult)){
  echo " <tr>";
echo  '<td ><a href="hola.php?D_id='.$row['IDN'].'&D_name='.$row['name'].'"> '.$row['name'].'</a></td>';



 echo "</tr>";


}
echo "</table >";

 }
 ?>
    </body>
</html>
