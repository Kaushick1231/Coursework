<?php
$email = $_POST['useremail'];
$password = $_POST['userpassword'];
$hashed_password = sha1($password);

$connection = mysqli_connect('localhost','root','','sdgp');
if(mysqli_connect_errno()){
    die ("Database connection failed !" . mysqli_connect_error());
} else{
    $query = "SELECT user_email,user_password FROM registration WHERE user_email = '{$email}' ";
    $result = mysqli_query($connection,$query);
    if($email == 'user_email' && $hashed_password == 'user_paassword'){
        echo file_get_contents("persona.html");
    } else {
        echo "incorrect password or email !";
}
}
?>