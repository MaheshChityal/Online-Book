<?php
if (isset($_POST['register'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname = "userlogin";


$con = mysqli_connect($server , $username , $password,$dbname );

if(!$con){
    die("connection to this database due to" . mysqli_connect_error());
}
// echo "Success connecting to database";

$name = $_POST['username'] ;
$email = $_POST['email'];
$password = $_POST['password'] ;
$repassword = $_POST['repassword'] ;

    if($password==$repassword){
    $sql = "INSERT INTO `userlogin`.`userdata`  (`username`, `email`, `password`,`date`) 
    VALUES ('$name', '$email', '$password' ,current_timestamp())"; 
    header("location:index.html");
}
else{
    header("location:home.html?pass=wrong");
}



if($con->query($sql) == true){
    echo "successfull inserted";
}
else{
    echo "ERROR: <br> $con->error";

}

}

?>