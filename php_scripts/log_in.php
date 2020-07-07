<?php
include("config/config.php");
$alert_msg='';
if(isset($_POST['submit'])){
   
  $username=$_POST['username'];
  $pssword=$_POST['password'];
$userType = "Administrator";
$select_user_sql ="SELECT * FROM user where username = :uname";
$user_data = $con->prepare($select_user_sql);
$user_data ->execute([
  'uname' => $username
  ]);
  if($user_data->rowCount() >0){
    while ($result =$user_data->fetch (PDO::FETCH_ASSOC))
    {
        session_start();
        $_SESSION['id'] = $result['userId'];
      
        
        // if($accnttype == 1)
       
        if($pssword!=$result['upass']){
            $alert_msg .= ' 
            <div class="new-alert new-alert-warning alert-dismissible">
                <i class="icon fa fa-warning"></i>
                Incorrect Password!
            </div>     
        ';
        }else{
            if ($result['userType']==$userType)
            {
             header('location:admin 2');
            }
        }
        }
     
    }else{
      $alert_msg .= ' 
      <div class="new-alert new-alert-warning alert-dismissible">
          <i class="icon fa fa-warning"></i>
          Username does not exist!
      </div>     
  ';
    

}

}

    
?>