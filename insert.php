<?php
    include 'connect.php';
    extract($_POST);
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])){
        $sql = "insert into `users` (name,email,mobile,address) values ('$name','$email','$mobile','$address')";
        $result = mysqli_query($con,$sql);
    }

?>