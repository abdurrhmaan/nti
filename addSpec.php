<?php


        //Database connection details
        $servername = "localhost";
        $username = "Abdurrhman";
        $password = "nti";
        $dbname = "test";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        mysqli_set_charset($conn,"utf8");
        //select clinics from Database
        $Cquery="select * from clinic";
        $Cresult = $conn->query($Cquery);

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $clinic= $_POST['clinic'];

        $spec = $_POST['spec'];
      //  echo $clinic;
      /*  $c3result = mysqli_fetch_row($c2result);
        echo $c3result;*/

        if( strlen($spec)== 0 || strlen($clinic)== 0 ){
          echo "<script type='text/javascript'>alert('راجع بياناتك مرة أخرى')</script>";
        }
        else {
        //  $C2query="SELECT id FROM clinic WHERE clinic.name = .$clinic. ";
        //  $c2result= mysqli_query($conn,$c2query);
        //insert data into patients table
        $sql1="INSERT INTO spec (name)
        VALUES
        ('$spec')";

        if ($conn->query($sql1) === TRUE  ) {
          $last_id = $conn->insert_id;
          $sql2="INSERT INTO `clinc_has_spec`(`specid`, `clinicid`) VALUES ($last_id,$clinic)";
          if ($conn->query($sql2) === TRUE) {echo "halamadrid";}
          /*echo "<script type='text/javascript'>alert('تم التسجيل بنجاح')</script>";*/
        } else {
          echo "Error: " . $cquery . "<br>" . $conn->error;
        }

        $conn->close();

    }
}
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


    <!--  <link rel="stylesheet" href="css/bootstrab.min.css"/> -->
  </head>
    <body>

      <div class="container">
        <br></br>
        <h2 class="text-center">Adminstrator Page</h2>
        <form class="contact-form " action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <input class="form-control name" type="text" name="spec" placeholder="أدخل اسم التخصص"/>
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger   nameAlert" role="alert" >
            تأكد من كتابة اسم التخصص بشكل صحيح.
          </div>

          <select class="form-control center" name="clinic" placeholder"اختر المركز الصحي ">
                <option > </option>
               <?php
                  while($row = mysqli_fetch_array($Cresult)) {
                      echo '<option value="'.$row['id'].'">'.$row['name']."</option>";}
                  ?>
          </select>
          <i class="fas fa-hospital fa-fw"></i>
          <div class="alert alert-danger   centerAlert" role="alert" >
          برجاء اختيار المركز الصحي التابع له.
          </div>
          <input class="btn btn-success btn-block" name="addspec" type="submit" value="ADD SPECIALIZATION TO CLINIC" />

   <script src="form/js/jquery-1.12.4.js"></script>
      <script src="form/js/form.js"></script>
      <script src="form/js/bootstrap.min.js"></script>
    </body>
</html>
