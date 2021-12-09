<?php

if (isset($_POST['login'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname = "userlogin";


$con = mysqli_connect($server , $username , $password,$dbname );

if(!$con){
    die("connection to this database due to" . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'] ;

$sql = "SELECT * FROM userdata WHERE email = '$email'";
$result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
            if($row['password']== $password){
                header("location:home.html");
            }
            else {
                echo "Your password is wrong";
            }
        }
        else{
            echo "there are no user with this email";
        }
}

?>