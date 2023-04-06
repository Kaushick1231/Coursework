<?php
$email = $_POST['useremail'];
$password = $_POST['userpassword'];

$con = new mysqli("localhost","root","","sdgp");
if ($con->connect_error){
    die("Failed to connect : ". $con->connect_error);    
}else{
    $stmt = $con->prepare("select * from registration from where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data["user_password"]==$password){
            echo "<h2>Login Successfully!</h2>";
        }
    }else {
        echo "<h2>Invalid Email or password</h2>";
    }
}

?>