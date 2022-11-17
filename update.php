<?php
    include 'connect.php';
    extract($_POST);
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && isset($_POST['id'])){
        $sql = "update `users` set name='$name',email='$email',mobile='$mobile',address='$address' where id=$id";
        $result = mysqli_query($con,$sql);
    }

?>