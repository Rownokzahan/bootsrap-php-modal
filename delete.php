<?php
    include 'connect.php';
    $id = $_POST['id'];
    $sql = "delete from `users` where id=$id";
    $result = mysqli_query($con,$sql);
    if(!$result){
        die(mysqli_error($result));
    }

?>