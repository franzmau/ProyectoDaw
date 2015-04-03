<html>
<body>
	 <form id="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form container-fluid">
                      <br>
                      <div class="form-group">
                      <input class="form-control" name="username" id="username" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
                      </div>
                      <div class="form-group">  
                      <input class="form-control" name="password" id="password" type="password" placeholder="Password" title="Enter your password" required="">
                      </div>  
                      <button type="submit" name="login" id="btnLogin" class="btn btn-block">Login</button>
                  <!--     <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <strong>Warning!</strong> There was a problem with your network connection.
                        </div> -->

                      <hr>
                      <?php if(isset($_POST['username']) && isset($_POST['password'])){
                        $u=$_POST['username'];
                        $pa=$_POST['password'];
                         $url = "http://localhost/DAW/daw/ProyectoDaw/vendor/slim/slim/index.php/validaUsuario/$u/$pa"; //Route to the REST web service
                      $c = curl_init($url);
                      $response = curl_exec($c);
                      curl_close($c);
                      } ?>
                      <a href="#" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister" class="small">New User? Sign-up..</a>
                    </form>

                        <link href="css/bootstrap.min.css" rel="stylesheet">
                        <link href="css/five.css" rel="stylesheet">
                        <script src="js/bootstrap.min.js"></script> 

</body>
</html>