<?php
    include 'connect.php';
    extract($_POST);
    if(isset($_POST['displaySend'])){
        $sql = "select * from `users`";
        $result = mysqli_query($con,$sql);
        $number = 1;
        while($row=mysqli_fetch_assoc($result)){
            $id= $row['id'];
            $name= $row['name'];
            $email= $row['email'];
            $mobile= $row['mobile'];
            $address= $row['address'];
            $tableRow ='<tr>
                <th scope="row">'.$number.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$address.'</td>
                <td>
                    <button type="button" onclick="showUserDetails('.$id.')" class="btn btn-dark m-1" data-bs-toggle="modal" data-bs-target="#update-modal"> Update </button>
                    <button type="button" onclick="deleteUser('.$id.')" class="btn btn-danger m-1"> Delete </button>
                </td>
            </tr>';
            echo $tableRow;           
            $number++;
        }
    }

?>
