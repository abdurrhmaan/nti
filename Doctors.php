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
        //select nodes from Database
        $Nquery="select * from clinic";
        $Nresult = $conn->query($Nquery);
        //select specializations from Database
        $Squery="select * from spec";
        $Sresult = $conn->query($Squery);



 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $D_name = $_POST['D_name'];
        $D_id = $_POST['D_id'];
        $D_phone = $_POST['D_phone'];
        $D_mail = $_POST['D_mail'];
        $healthCenter = $_POST['healthCenter'];
        $D_specialization = $_POST['D_specialization'];

        if(strlen($D_id)!= 14 || strlen($D_name)== 0 ||strlen($D_phone)!= 11 ){
          echo "<script type='text/javascript'>alert('راجع بياناتك مرة أخرى')</script>";

        }
        else {

        //insert data into patients table
        $sql="INSERT INTO doctor (IDN,name, phone,clinicid,specid,mail)
        VALUES
        ('$D_id','$D_name','$D_phone','$healthCenter','$D_specialization','$D_mail')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
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
      <title> Doctors Page </title>
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
        <h2 class="text-center">اكتب بياناتك بشكل صحيح</h2>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <input class="form-control name" type="text" name="D_name" placeholder="أدخل اسمك ثلاثيًا"/>
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger   nameAlert" role="alert" >
          برجاء ادخال الاسم بشكل صحيح
          </div>
          <input class="form-control id" type="text" name="D_id" placeholder="الرقم القومي"/>
          <i class="fas fa-id-card fa-fw"></i>
          <div class="alert alert-danger   idAlert" role="alert" >
          برجاء كتابة الرقم القومي بشكل صحيح.
          </div>
          <input class="form-control phone" type="text" name="D_phone" placeholder="رقم الهاتف"/>
          <i class="fas fa-mobile-alt fa-fw"></i>
          <div class="alert alert-danger   phoneAlert" role="alert" >
          برجاء كتابة رقم الهاتف بشكل صحيح.
          </div>
          <input class="form-control mail" type="email" namahmede="D_mail" placeholder="البريد الإلكتروني"/>
          <i class="fas fa-envelope fa-fw"></i>
          <div class="alert alert-danger   mailAlert" role="alert" >
          برجاء كتابة البريد الالكتروني بشكل صحيح
          </div>
          <select class="form-control specialization" name="D_specialization" placeholder"التخصص">
                <option > </option>
                <?php
                   while($row = mysqli_fetch_array($Sresult)) {
                       echo '<option value="'.$row['id'].'">'.$row['name']."</option>";}
                   ?>
          </select>
          <i class="fas fa-city fa-fw"></i>
          <div class="alert alert-danger   specAlert" role="alert" >
          برجاء اختيار تخصصك.
          </div>
          <select class="form-control center" name="healthCenter" placeholder"اختر المركز الصحي ">
                <option > </option>
                <?php
                   while($row = mysqli_fetch_array($Nresult)) {
                       echo '<option value="'.$row['id'].'">'.$row['name']."</option>";}
                   ?>
          </select>
          <i class="fas fa-hospital fa-fw"></i>
          <div class="alert alert-danger   centerAlert" role="alert" >
          برجاء اختيار المركز الصحي التابع له.
          </div>
          <input class="btn btn-success btn-block" type="submit" value="ADD DOCTOR TO SYSTEM" />
     </form>
   </div>
   <script src="form/js/jquery-1.12.4.js"></script>
      <script src="form/js/form.js"></script>
      <script src="form/js/bootstrap.min.js"></script>
    </body>
</html>
