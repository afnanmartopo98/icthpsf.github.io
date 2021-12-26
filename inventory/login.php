<?php

	session_start();
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$koneksi = new mysqli("localhost","root","","inventori");

	
	?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Responsive Login Form</title>
  </head>
  <body>
    <img
      class="background-img"
      src="img/background-img.jpg"
      alt="background-image"
    />

    <div class="container">
      <!-- Left Section -->
      <div class="left-img">
        <img src="img/HPSF (1).png" alt="Game Machine Logo" />
      </div>
      <!-- Right Section -->
      <div class="login-form">
        <img src="img/user.svg" alt="cards-avatar" />
        <h2>Log Masuk Inventori ICT HPSF</h2>
        <form action="" method="post">
          <div class="input-control">
            <div class="icon">
              <i class="fas fa-user-circle"></i>
            </div>
            <div>
              <h5>Username</h5>
              <input name="username" type="text" class="input" />
            </div>
          </div>
          <div class="input-control">
            <div class="icon">
              <i class="fas fa-lock"></i>
            </div>
            <div>
              <h5>Password</h5>
              <input name="password" type="password" class="input password" />
            </div>
          </div>
          <a href="change-password.php">Forgot Password?</a>
          <input name="login" type="submit" class="btn" value="Log in" />
        </form>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>

<?php
	if(isset($_POST['login'])){

					$username = $_POST['username'];
					$password = md5($_POST['password']);
					
					
						$sql = $koneksi->query("select * from users where username='$username' and password='$password'");
						$ketemu = $sql->num_rows;
						$data = $sql->fetch_assoc();
						
						if ($ketemu ==1) {
							session_start();
							
							        $_SESSION['login_user'] = $username;

								
								header("location:index3.php");
							
						}
						else {
							echo '<center><div class="alert alert-danger">Log Masuk tidak berjaya. Silakan Cuba sekali lagi</div></center>';
						
						}
					}
					
				?>
