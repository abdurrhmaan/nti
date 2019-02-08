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
$hquery="select * from clinic";
$hresult = $conn->query($hquery);

if ($_POST['enterPatient']){
        $P_name = $_POST['P_name'];
        $P_id = $_POST['P_id'];
        $P_phone = $_POST['P_phone'];
        $P_mail = $_POST['P_mail'];
        $healthCenter= $_POST['healthCenter'];

        //validate patient information
        if(strlen($P_id)!= 14 ){
          echo "<script type='text/javascript'>alert('راجع بياناتك مرة أخرى')</script>";

        }
        else {




        //insert data into patients table
        $sql="INSERT INTO Patients (P_id, P_name,P_phone,P_mail,nodeid)
        VALUES
        ('$P_id','$P_name','$P_phone','$P_mail','$healthCenter')";
        if ($conn->query($sql) === TRUE) {
          /*echo "<script type='text/javascript'>alert('تم التسجيل بنجاح')</script>";*/
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
      <title> Patient page </title>
      <link rel="stylesheet" href="form/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="form/css/fontawesome.min.css"/>
      <link rel="stylesheet" href="form/css/all.css"/>
      <link rel="stylesheet" href="form/css/form.css"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri">
<style>



</style>

  </head>
    <body>

      <div class="header">

        <h3 > هلا مدريد  </h3>
        <i class="fas fa-map-marker-alt"></i>
      </div>

      <div style="padding-left:20px">

      </div>
      <div class="container">
        <br></br>
        <h2 class="text-center">اكتب بياناتك بشكل صحيح</h2>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

          <input class="form-control name" type="text" name="P_name" placeholder="أدخل اسمك ثلاثيًا"  />
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger   nameAlert" role="alert" >
          برجاء ادخال الاسم بشكل صحيح
          </div>
          <input class="form-control  id" type="text" name="P_id" placeholder="الرقم القومي"/>
          <i class="fas fa-id-card fa-fw"></i>
          <div class="alert alert-danger   idAlert" role="alert" >
          برجاء كتابة الرقم القومي بشكل صحيح.
          </div>
          <input class="form-control phone" type="text" name="P_phone" placeholder="رقم الهاتف"/>
          <i class="fas fa-mobile-alt fa-fw"></i>
          <div class="alert alert-danger   phoneAlert" role="alert" >
          برجاء كتابة رقم الهاتف بشكل صحيح.
          </div>
          <input class="form-control mail" type="email" namahmede="P_mail" placeholder="البريد الإلكتروني"/>
          <i class="fas fa-envelope fa-fw"></i>
          <div class="alert alert-danger   mailAlert" role="alert" >
          برجاء كتابة البريد الالكتروني بشكل صحيح
          </div>
          <select class="form-control center" name="healthCenter" placeholder"اختر المركز الصحي ">
                <option > </option>
                <?php
                   while($row = mysqli_fetch_array($hresult)) {
                       echo '<option value="'.$row['id'].'">'.$row['name']."</option>";}
                   ?>
          </select>
          <i class="fas fa-hospital fa-fw"></i>
          <div class="alert alert-danger   centerAlert" role="alert" >
          برجاء اختيار المركز الصحي التابع له.
          </div>
          <input class="btn btn-success btn-block salah" name="enterPatient" type="submit" value="SUBMIT" formaction="try.php"/>
     </form>
   </div>
      <script src="form/js/jquery-1.12.4.js"></script>
      <script src="form/js/bootstrap.min.js"></script>
      <script src="form/js/form.js"></script>
      <small   class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>جميع الحقوق محفوظه للمعهد القومى للاتصالات  <i class="icon-heart" aria-hidden=""></i> by <a href="" target="_blank">Unifed network track Sec. Team</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small>
    </body>
</html>
