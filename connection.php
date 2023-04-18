<?php 

$name = $_POST['username'];
$email = $_POST['useremail'];
$password = $_POST['userpassword'];

//encrypt password

$hashed_password = sha1($password);

//database connection


$connection = mysqli_connect('localhost','root','','sdgp');

//checking the connection
if(mysqli_connect_errno()){
    die ("Database connection failed !" . mysqli_connect_error());
} else{
    $query = "INSERT INTO registration(user_name,user_email,user_password)
    VALUES ('{$name}','{$email}','{$password}')";

    $result = mysqli_query($connection,$query);
    if($result){
        echo file_get_contents("registration.html");
    } else {
        echo "Database query failed!";
    }
}

?>