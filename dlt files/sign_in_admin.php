
<?php require_once("../../config/connect.php"); ?>

<?php
  session_start();
      
 
  if(isset($_POST['submit'])){
    //save username and password into variables
    $userName =mysqli_real_escape_string($connection,$_POST['userName']);
    $password =mysqli_real_escape_string($connection,$_POST['password']);

    //prepare database query
    //use "email" as username and "pwd" as password in "manager" table
    $query=mysqli_query($connection,"SELECT * FROM manager WHERE email='{$userName}' AND pwd ='{$password}' LIMIT 1");
    $row=mysqli_fetch_array($query);
    $type=$row['emp_status'];

    //use "email" as username and "pwd" as password in "manager" table
    $isexist=mysqli_query($connection,"SELECT * FROM manager WHERE email='{$userName}' AND pwd ='{$password}' LIMIT 1");
    $check_user=mysqli_num_rows($isexist);

    if($check_user==1){
      $_SESSION["type"]=$row['emp_status'];
      $_SESSION["userName"]=$row['email'];

      $user=mysqli_fetch_assoc($isexist);
      $_SESSION["first_name"]=$user['first_name'];
      $_SESSION["last_name"]=$user['last_name'];
      
      if($type=="manager"){
        //redirect to manager page 
        header('Location: manager_home.php');
      }
    }else{
      echo "<script>alert('Invalid Username or Password');</script>";
    }

  }
?>

<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/style_sign_in.css">
    <link rel="stylesheet" type="text/CSS" href="../../public/css/homenav.css">
  </head>
  <body>
    <div class="loginBox">
      <img src="../../public/img/login.png" class="icon">
        <h1>Login Here</h1>
        <form name="loginForm" action="sign_in_admin.php"  method="post">
          <p>Username</p>
          <input type="text" name="userName" placeholder="Enter Username" required>
          <p>Password</p>
          <input type="password" name="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <input type="submit" name="submit" value="Login">
        </form> 
    </div>

  </body>
</html>