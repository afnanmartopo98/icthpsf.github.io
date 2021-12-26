<?php
include ("koneksibarang.php");
$error='';
session_start();
if(isset($_POST['submit'])){
$email = $_POST['email'];
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = "inventori";

$conn = new mysqli($host,$user,$password);
if ($conn->connect_errno) {
    printf("Connection failed: %s\n", $conn->connect_error);
    die();
}

$conn = mysqli_connect($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$kunci = bin2hex(random_bytes(16));
$pengesahanEmail = mysqli_query($conn, "UPDATE users SET kunci='$kunci' WHERE email = '$email'");
 



    if ($pengesahanEmail) {
        $row = mysqli_fetch_assoc($pengesahanEmail);
$error='';

    $login_session = $row['email'];
        mail($cust_email, "pengesahan email", "sahkan email anda disini : http://localhost/Inventory-Barang/sahkankatalaluan.php?kunci=$kunci");

                    header('Location:login.php');
    } else {
        echo "Error inserting data: ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
                <form action="lupakatalaluan.php" method="POST" autocomplete="">
                    <h2 class="text-center">LUPA KATA LALUAN</h2>
                    <p class="text-center">Sila Masukkan E-mel Anda</p>
                                            

                    <div class="form-group">
                        <input class="form-control" type="email" id="email" required="_required" name="email" placeholder="Masukkan E-mel anda">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="submit"  value="Lanjutkan">
                    </div><a style="color: red; font-size: 12px;"><?php echo $error;?>*setelah masukkan email, sila semak email anda untuk kemaskini kata laluan</a>
                </form>
            </div>
        </div>
    </div>
  
</body>
</html>