<?php

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $N_name = $_POST['N_name'];
        $S_name = $_POST['S_name'];


        if( strlen($N_name)== 0 and strlen($S_name == 0) ){
          echo "<script type='text/javascript'>alert('راجع بياناتك مرة أخرى')</script>";

        }
        else {


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

        if (isset($_POST['addNode']))
         {

        //insert data into clinic table
        $sql="INSERT INTO clinic (name)
        VALUES
        ('$N_name')";
        if ($conn->query($sql) === TRUE) {
          echo "<script type='text/javascript'>alert('تم التسجيل بنجاح.')</script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }}
        /*elseif(isset($_POST['addSpec'])) {

          //insert data into patients table
          $sql="INSERT INTO Spec (name)
          VALUES
          ('$S_name')";
          if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }*/

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
          <input class="form-control name" type="text" name="N_name" placeholder="أدخل اسم المركز"/>
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger   nameAlert" role="alert" >
        تأكد من كتابة اسم المركز بشكل صحيح.
          </div>
          <input class="btn btn-success btn-block" name="addNode" type="submit" value="ADD New CLINIC TO SYSTEM" />
            <!--
          <input class="form-control name" type="text" name="S_name" placeholder="ادخل اسم التخصص"/>
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger   nameAlert" role="alert" >
           تأكد من كتابة اسم التخصص بشكل صحيح.
          </div>
          <input class="btn btn-success btn-block" name="addSpec" type="submit" value="ADD New specialization TO SYSTEM" />
     </form>
   </div>-->

   <script src="form/js/jquery-1.12.4.js"></script>
      <script src="form/js/form.js"></script>
      <script src="form/js/bootstrap.min.js"></script>
    </body>
</html>
