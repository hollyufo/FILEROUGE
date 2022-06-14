<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./views/assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon-16x16.png">
    <link rel="manifest" href="./views/assets/img/site.webmanifest">
</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
<div id='title'>
  <section class="user">
  <?php
  if(isset($_GET['error'])){
    echo '<div style="text-align: center;" class="errors">Invite Code is wrong</div>';
  }
  else if(isset($_GET['success'])){
    echo '<div style="text-align: center;" class="success">You have successfully registered</div>';
  }
  elseif(isset($_GET['errorlogin'])){
    echo '<div style="text-align: center;" class="errors">Email or Password is wrong</div>';
  }
  ?>
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered">
          <h2 class="user_unregistered-title">Don't have an account?</h2>
          <p class="user_unregistered-text">By logging in you agree to the ridiculous long terms that you didn't bother to read
            .</p>
          <button class="user_unregistered-signup" id="signup-button">Sign up</button>
        </div>
  
        <div class="user_options-registered">
          <h2 class="user_registered-title">Have an account?</h2>
          <p class="user_registered-text">By logging in you agree to the ridiculous long terms that you didn't bother to read</p>
          <button class="user_registered-login" id="login-button">Login</button>
        </div>
      </div>
      
      <div class="user_options-forms" id="user_options-forms">
        <div class="user_forms-login">
          <h2 class="forms_title">Login</h2>
          <form class="forms_form" action="/login" method="post">
            
              <div class="forms_field">
                <input type="email" placeholder="Email" name="email" class="forms_field-input" required autofocus />
              </div>
              <div class="forms_field">
                <input type="password" placeholder="Password" name="password" class="forms_field-input" required />
              </div>
            
            <div class="forms_buttons">
              <button type="button" class="forms_buttons-forgot">Forgot password?</button>
              <input type="submit" value="Log-In" class="forms_buttons-action">
            </div>
          </form>
        </div>
        <div class="user_forms-signup">
          <h2 class="forms_title">Sign Up</h2>
          <form class="forms_form" method="post" action="./signup">
              <div class="forms_field">
                <input type="text" placeholder="invite number" name="code" class="forms_field-input" required />
              </div>
              <div class="forms_field">
                <input type="text" placeholder="Full Name" name="fullname" class="forms_field-input" required />
              </div>
              <div class="forms_field">
                <input type="email" placeholder="Email" name="email" class="forms_field-input" required />
              </div>
              <div class="forms_field">
                <input type="password" placeholder="Password" name="password" class="forms_field-input" required />
              </div>
            <div class="forms_buttons">
              <input type="submit" value="Sign up" class="forms_buttons-action">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./views/assets/js/script.js"></script>

</body>
</html>
