  <?php

  include_once('members.php');


  if(isset($_REQUEST['email'])&&(isset($_REQUEST['password']))){
   $email = trim($_REQUEST['email']);
  $password=trim($_REQUEST['password']);

  $member=new members();
  $row = $member->login($email , $password);
  $result = $member->fetch();

  if(!$result){
    echo "Wrong email or password";
    exit();
  }

  $result=$obj->fetch();
  if(!$result){
  				//username or password must be wrong
    echo "username or password is wrong.";
  }
  error_reporting(0);
  session_start();

  $_SESSION['USER']=$result;
  

}












?>



