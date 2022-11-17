<?php
    include 'connect.php';
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "select * from `users` where id= $id";
        $result = mysqli_query($con,$sql);
        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response =$row;
        }
        echo json_encode($response);
    }else{
        $response['status']= 200;
        $response['message']= "Invalid or data not found";
    }
?>
