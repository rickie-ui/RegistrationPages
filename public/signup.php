<?php

require  '../controller/validator.php';

if (isset($_POST['submit'])) {
  $validation = new UserValidation($_POST);
  $errors = $validation->validateForm();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/master.css" />
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>SignUp</title>
</head>

<body>
  <div class="signup">
    <div class="back-arrow" id="back"><i class="fa fa-long-arrow-left"></i></div>
    <div class="signup-form">
      <h2>Create an account</h2>
      <form class="signup" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="text" placeholder="Username" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>" />
        <div style="color:red; margin-bottom:4px">
          <?php echo $errors['username'] ?? '' ?>
        </div>
        <input type="text" placeholder="Email" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>" />
        <div style="color:red; margin-bottom:4px">
          <?php echo $errors['email'] ?? '' ?>
        </div>
        <input type="text" placeholder="Phone" name="phone" value="<?php echo htmlspecialchars($_POST['phone']) ?? '' ?>" />
        <div style="color:red; margin-bottom:4px">
          <?php echo $errors['phone'] ?? '' ?>
        </div>
        <input type="text" placeholder="Date of Birth" name="birth" value="<?php echo htmlspecialchars($_POST['birth']) ?? '' ?>" />
        <div style="color:red; margin-bottom:4px">
          <?php echo $errors['birth'] ?? '' ?>
        </div>
        <input type="password" placeholder="Password" name="password" autocomplete="on" />
        <div style="color:red; margin-bottom:4px">
          <?php echo $errors['password'] ?? '' ?>
        </div>

        <button type="submit" class="login-btn" name="submit">Submit</button>
        <div class="login-link forgot">
          By clicking Sign up you agree to the following
          <a href="#" class="sign-link">Terms and Conditions</a>
          without reservations
          </p>
        </div>
      </form>
    </div>
  </div>
  <script>
    let back = document.querySelector('#back');
    back.addEventListener('click', function() {
      window.location.href = "/index.php";
    });
  </script>
</body>

</html>