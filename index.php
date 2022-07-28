<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/master.css" />
    <!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Home</title>
  </head>
  <body>
    <div class="home">
      <div class="home-content">
        <h1>Delivered Fast food to your door</h1>
        <p>Set exact location to find the right restaurant for you</p>
      </div>
      <div class="btn-group">
        <button type="submit" id="login">Login</button>
        <button type="submit" id="glogin">
          <i class="fa fa-facebook-square"></i>
          Continue with facebook
        </button>
      </div>
    </div>

    <script>
      let login = document.querySelector('#login');
      login.addEventListener('click', function(){
        window.location.href = "./public/signup.php";
      });
    </script>
  </body>
</html>
