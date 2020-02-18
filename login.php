<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Login</title>
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Sign In </h2>

  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="https://cdn4.iconfinder.com/data/icons/basic-interface-overcolor/512/user-512.png" id="icon" alt="User Icon" />
      </div>
  
      <!-- Login Form -->
      <form id="myForm">
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
        <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
  
    </div>
  </div>
  <script type="text/javascript" src="assets/javascript/login.js"></script>
</body>
</html>
