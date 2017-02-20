<?php

// if(isset($_POST["submit"])){
//     $phone = $_POST["phone"];
//     $email = $_POST["email"];
// }

// PHP Data Objects(PDO) Sample Code:
// try {
//     $conn = new PDO("sqlsrv:server = tcp:lendingsquare.database.windows.net,1433; Database = lendingsquare", "lsadmin", "P@55word@2016_");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch (PDOException $e) {
//     print("Error connecting to SQL Server.");
//     die(print_r($e));
// }

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "lsadmin@lendingsquare", "pwd" => "P@55word@2016_", "Database" => "lendingsquare", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:lendingsquare.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

// if($conn){
//     echo "Successfull";
// }
// else{
//     echo "Not";
// }

?>