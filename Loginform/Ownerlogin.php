<!DOCTYPE html>
<?php 

    session_start();

    $msg=$uname=$msg1='';

    if (isset($_SESSION['msg'])) {
      $msg = $_SESSION['msg'];
    }

    if (isset($_SESSION['msg1'])) {
      $msg1 = $_SESSION['msg1'];
    }

    if (isset($_SESSION['username'])) {
      $uname = $_SESSION['username'];
    }
    session_destroy();
?>

<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-compatible" content="ie-edge" />
      <link rel="stylesheet" href="style2.css" />
      <title>Sign in/Sign up form</title>
   </head>

    <body>
      <a href="../index.php">
        <img src="bbutton.png" alt="index" style="width:42px;height:42px;border:0">
      </a>

      <div align="center">
        <span style="color:#01DF01; font-size:18px"><b><?php echo $uname; echo $msg; ?></b></span><br>
        <span style="color:#FE2E2E; font-size:18px"><b><?php echo $msg1; ?></b></span>
      </div>

      <div class="container" id="container">

        <div class="form-container sign-up-container">
          <form action="ownerregphp.php" method="POST">
            <h1>Create Account</h1>

            <input type="text" placeholder="User name" name="uname" required/>
            <input type="password" placeholder="Password (check before submitting)" name="upass" required/>
            <input type="email" placeholder="Email" name="mail" required/>
            <input type="tel" placeholder="Mobile Number" name="mobile" required/>
            <input type="text" placeholder="NID Number" name="nid" required/>
            <input type="text" placeholder="Address" name="addr" required/>
            <input type="text" placeholder="Parking Area" name="p_area" required/>
            <select name="p_division" required>
              <option value="" disabled selected>-Select a Division-</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Comilla">Comilla</option>
              <option value="Khulna">Khulna</option>
              <option value="Barishal">Barishal</option>
              <option value="Rangpur">Rangpur</option>
            </select>
            <input type="number" placeholder="Space Allocation" name="spc" required/>
            <button>Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in-container">
          <form action="ownerlogphp.php" method="POST">
            <h1>Owner Login</h1>

            <span>Give your space for parking</span>
            <input type="text" placeholder="User name" name="uname" required/>
            <input type="password" placeholder="Password" name="upass" required/>
            <a href="#">Forgot your password?</a>
            <button name="lgn_btn">Login</button>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
          container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
          container.classList.remove("right-panel-active");
        });

      </script>

    </body>

</html>
