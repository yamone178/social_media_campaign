<?php
$conn=new mysqli("localhost","root","","smc_1");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
// else{
//     echo "Connection Successful";
// }

?>