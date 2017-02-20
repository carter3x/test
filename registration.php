<?php
//  $host = "tcp:lendingsquare.database.windows.net,1433";
//  $user = "lsadmin";
//  $pwd = "P@55word@2016_";
//  $db = "lendingsquare";

// // Connect to database.
//  try {
//      $conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
//      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//  }
//  catch(Exception $e){
//      die(var_dump($e));
//  }

 
if(!empty($_POST)) {
 try {
     $name = $_POST['phone'];
     $email = $_POST['email'];
     $date = date("Y-m-d");
 }
 catch(Exception $e) {
     die(var_dump($e));
 }

header("Location:you.php");
//  echo $name."<br />". $email;
}

?>