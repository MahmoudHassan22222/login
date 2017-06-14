<?php
  require "header.php";
  require "dbase.php";

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_again = $_POST['password2'];
    $name = $_POST['name'];

    $getUser = $connect->prepare("SELECT username FROM users WHERE username = :yuser");
    $getUser->execute(array(
      ':yuser' => $user
    ));
    $userCount = $getUser->rowCount();
    if($userCount == 0){
      if ($password == $password_again) {
        $stmnt = $connect->prepare(" INSERT INTO users (
                                                      username,
                                                      password,
                                                      name,
                                                      email )
                                              VALUES  (
                                                      :xuser,
                                                      :xpass,
                                                      :xname,
                                                      :xmail )
        ");
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

    } else {
        $err = "Password Wrong";
    }
  } else {
    $err = "This User is Already Exsits In Our WebSite";
  }
}
  include('form.php');
  include('footer.php');
?>
