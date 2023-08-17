<?php
    $firstname=$_POST['fname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $psd=$_POST['psd'];
    $confpsd=$_POST['psd'];
    //creating a connection to the database
    $servername ="localhost";
    $username ="root";
    $password ="";
    $db="formreg";
    $conn = new mysqli($servername, $username,$password, $db);
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else if($psd != $confpsd){
        echo"Password Mismatched!";
    }
    else{
        $stmt = $conn->prepare("insert into users_info(fname, phone, email, password, confpassword)values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $firstname,$phone,$email,$psd,$confpsd);
        $stmt->execute();
        $stmt->close();
        $conn->close();
       echo"You have been successfully registered.";
     }
?>