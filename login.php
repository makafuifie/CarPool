  <?php
  include_once('members.php');
  if(isset($_REQUEST['email'])&&(isset($_REQUEST['password']))){
  $email = trim($_REQUEST['email']);
  $password=trim($_REQUEST['password']);
  //remember to fix md5
 // $password=md5(trim($_REQUEST['password']));
  //echo $password;
  //$password=md5('$rawpassword');
  // echo $email;
  // echo $password;
  
  $member=new members();
  $row = $member->login($email , $password);
  if($row=false){
    echo "Error finding user";
    exit();
  }

  $result=$member->fetch();
  
  if(!$result){
  				//username or password must be wrong
    echo "username or password is wrong.";
  }
  else{
    echo "ok";
  }
// error_reporting(0);
session_start();
$_SESSION['USER']=$result;
}












?>



