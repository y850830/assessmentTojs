
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="../../favicon.ico">

    <title>虎科大租屋評核系統</title>

    <link href= <?php echo base_url('css/bootstrap.min.css'); ?> rel="stylesheet">

    <link href= <?php echo base_url('css/signin.css'); ?> rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action= "Login/check" method="post">

        <h2 class="form-signin-heading">虎科大租屋評核系統</h2>

        <label for="account" class="sr-only">Account</label>

        <input type="" name="account" class="form-control" placeholder="Account" required autofocus>
        
        <label for="password" class="sr-only">Password</label>
        
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <div class="checkbox">

          <label>

            <input type="checkbox" value="remember-me"> Remember me
          
          </label>

        </div>
          <select class='form-control' name='selectUser'>
            <option value='0'>管理者</option>
            <option value='1'>校安人員</option>
          </select>
          <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

      </form>

     <!--  <form class="form-signin" action= "" method="">

        <a href="login/oauth"><img src="img/btn_google.png"></img><a>
      
      </form> -->
      
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
  
</html>
