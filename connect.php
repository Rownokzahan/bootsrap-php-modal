<?php
  $con = mysqli_connect('localhost','root','','bootsrapcrud');
  if($con){
    // echo "success";
  }else{
    die(mysqli_error($con));
  }
?>