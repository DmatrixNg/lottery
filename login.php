<?php
//include config
require_once('includes/db.php');
$title = 'Welcome to lottery';
$location = 'login';
//check if already logged in
if( $user->is_logged_in() ){
  //header('Location: '/'');
}
?>

<?php
include 'header.php'; ?>

  <body>
    <?php
    //process login form if submitted
    if(isset($_POST['submit'])){

      $email = trim($_POST['email']);
      $password = trim($_POST['password']);
 //will be true or false
      if($user->login($email,$password)){
print_r($_SESSION);
extract($_SESSION);

if ($status == "waiting") {
    header('Location: /procession.php');
    exit;
}
if ($status == "approve") {
    header('Location: /approved.php');
    exit;
}
if ($status == "reject") {
    header('Location: /rejected.php');
    exit;
}


      } else {
        $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Oops!</strong> Wrong email or password<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      }

    }//end if submit


    ?>
      <main>


            <canvas class="particles-js-canvas-el" width="1349" height="261" style="width: 100%; height: 100%;"></canvas></header>
            <!-- form -->
            <form class="auth-form" autocomplete="yes" method="post">
              <!-- .form-group -->
                <?php  if(isset($message)){ echo $message; }?>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputUser" name="email" class="form-control" required="" autofocus="">
                  <label for="inputUser">Email</label>
                </div>
              </div>
              <!-- /.form-group -->
              <!-- .form-group -->
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" required="">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <!-- /.form-group -->
              <!-- .form-group -->
              <div class="form-group">
                <button class="btn btn-lg btn-block" name="submit"  type="submit">Sign In</button>
              </div>
              <!-- /.form-group -->
              <!-- .form-group -->


            </form>
            <!-- /.auth-form -->
            <!-- copyright -->
            <footer class="auth-footer"> © 2018 All Rights Reserved.
              <a href="#">Privacy</a> and
              <a href="#">Terms</a>
            </footer>
            <script src="particles.min.js" charset="utf-8"></script>

          </main>
          </body>
</html>
