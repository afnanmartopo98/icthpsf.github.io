<?php
include ("config.php");

session_start();
$error='';
if(isset($_POST['submit'])){
$password = $_POST['password'];
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "inventori";

$conn = new mysqli($host,$user,$password);
if ($conn->connect_error) {
    printf("Connection failed: %s\n", $conn->connect_error);
    die();
}

$conn = mysqli_connect($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$kunci = $_GET['kunci'];

$pengesahanEmail = mysqli_query($conn, "UPDATE users SET password='$password' WHERE kunci = '$kunci'");
 



    if ($pengesahanEmail) {
        
        
echo '<script>alert("Tahniah E-mel Anda Berjaya Dikemaskini")</script>';
echo "<script type = 'text/javascript'> location.href = 'login.php'</script>";

    } else {
        echo "Error inserting data: ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kemaskini Kata Laluan Baharu</title>
    <link rel="shortcut icon" href="assets/images/1.jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    background: #6665ee;
    font-family: 'Poppins', sans-serif;
}
::selection{
    color: #fff;
    background: #6665ee;
}
.container{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.container .form form .forget-pass{
    margin: -15px 0 15px 0;
}
.container .form form .forget-pass a{
   font-size: 15px;
}
.container .form form .button{
    background: #6665ee;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #5757d1;
}
.container .form form .link{
    padding: 5px 0;
}
.container .form form .link a{
    color: #6665ee;
}
.container .login-form form p{
    font-size: 14px;
}
.container .row .alert{
    font-size: 14px;
}

</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form method="POST" autocomplete="off">
                    <h2 class="text-center">Kata Laluan Baharu</h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Bina kata laluan baharu" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Pastikan kata laluan anda" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit" value="Kemaskini">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

