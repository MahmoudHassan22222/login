<!-- Start Login Form -->
<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1 class="text-center">REGISTER MANAGMENT</h1>
    <!-- Error And Success Messages  -->
    <?php
      if(isset($err)){
        echo "<div class='alert alert-danger text-center errors'>" . $err . "</div>";
      }
      if(isset($success)){
        echo "<div class='alert alert-success text-center errors'>" . $success . "</div>";
      }
    ?>
    <!-- End Error And Success Messages -->
      <br />
    <input class="form-control input-lg" type="text" name="name" placeholder="First and last name" />
    <input class="form-control input-lg" type="text" name="user" placeholder="username" />
    <input class="form-control input-lg input-lg input-lg" type="email" name="email" placeholder="Valid your email" />
    <input class="form-control input-lg input-lg input-lg" type="password" name="password" placeholder="Type password" />
    <input class="form-control input-lg input-lg" type="password" name="password2" placeholder="Rtype password" />

    <input class="btn btn-primary btn-block btn-lg" type="submit" name="submit" value="REGISTER" />
  </form>
  <div class="register text-center">
    <p>You have account ? <span>LOGIN NOW</span></p>
  </div>


</div>
<!-- End Login Form -->
