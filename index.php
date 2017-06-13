<?php
  require "header.php";
  require "dbase.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_again = $_POST['password2'];
    $name = $_POST['name'];

    $user = $connect->prepare("SELECT username FROM users WHERE username = :yuser");
    $user->execute(array(
      ':yuser' => $_POST['user']
    ));
    $userCount = $user->rowCount();
    if($userCount == 0){
    if ($password == $password_again) {
    $stmnt = $connect->prepare("INSERT INTO users SET
      username = :xuser, password = :xpass, name = :xname, email = :xmail");
    $stmnt->execute(array(
      ':xuser' => $user,
      ':xpass' => sha1($password),
      ':xname' => $name,
      ':xmail' => $email
    ));
    $count = $stmnt->rowCount();
    if($count > 0){
      $success = "You are registered";
    }

  }else {
    $err = "Password Wrong";
  }
}

  }
?>
<!-- Start Login Form -->
<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <h1 class="text-center">REGISTER MANAGMENT</h1>
    <input class="form-control input-lg" type="text" name="user" placeholder="Type your username" />
    <input class="form-control input-lg input-lg input-lg" type="email" name="email" placeholder="Valid your email" />
    <input class="form-control input-lg input-lg input-lg" type="password" name="password" placeholder="Type password" />
    <input class="form-control input-lg input-lg" type="password" name="password2" placeholder="Type password Again" />
    <input class="form-control input-lg" type="text" name="name" placeholder="First and last name" />
    <input class="btn btn-primary btn-block btn-lg" type="submit" name="submit" value="REGISTER" />
  </form>
  <div class="register text-center">
    <p>You have account ? <span>LOGIN NOW</span></p>
  </div>
  <?php
    if(isset($err)){
      echo "<div class='alert alert-danger text-center errors'>" . $err . "</div>";
    }
    if(isset($success)){
      echo "<div class='alert alert-success text-center errors'>" . $success . "</div>";
    }
  ?>
</div>
<!-- End Login Form -->
