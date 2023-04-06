<?php 
$name = $_POST['username'];
$email = $_POST['useremail'];
$password = $_POST['userpassword'];

//encrypt password

$hashed_password = sha1($password);

//database connection

$conn = new mysqli('localhost','root','','sdgp');
if($conn->connect_error){
    die('Connection Failed :'. $conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(user_name,user_email,user_password)
        values('?','?','?')");
    $stmt->bind_param("sss","{$name}","{$email}","{$hashed_password}");
    $stmt ->execute();
    echo "registration successfully...";
    $stmt->close();
    $conn->close();
}
?>