<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="container">
        <h2 class="text-center">PHP CRUD opration using Bootstrap Modal</h2>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark mt-4 p-2" data-bs-toggle="modal" data-bs-target="#add-user-model">
            Add User
        </button>

        <table class="mt-4 table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody id="display-data-table"></tbody>
        </table>
    </main>

    <!-- Modal For Add User -->
    <div class="modal fade" id="add-user-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="tell" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button id="create-user" onclick="addUser()" type="sumbit" name="sumbit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal For Update User -->
    <div class="modal fade" id="update-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="update-name" name="name" value="" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" id="update-email" name="email" value="" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="tell" class="form-control" id="update-mobile" name="mobile" value="" placeholder="Enter your mobile number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="update-address" name="address" value="" placeholder="Enter your address">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button id="update-user" onclick="updateUser()" type="sumbit" name="sumbit" class="btn btn-primary">Update</button>
                    <input type="hidden" id="hidden">
                </div>
            </div>
        </div>
    </div>
   
<!-- connecting jQuery using CDN -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> 

<!-- custom js is here -->
<script>
    $(document).ready(function () {
        displayData();
    }); 

    function displayData(){
        const displayData = "true";
        $.ajax({
            url:"display.php",
            type:"post",
            data:{
                displaySend: displayData,
            },
            success:function(data,status){
                // console.log(status);
                $('#display-data-table').html(data);
            }
        })
    }

    function addUser(){
        const name= $('#name').val();
        const email= $('#email').val();
        const mobile= $('#mobile').val();
        const address= $('#address').val();
        $.ajax({
            url:"insert.php",
            type:'post',
            data:{
                name: name,
                email: email,
                mobile: mobile,
                address: address,
            },
            success:function(data,status){
                displayData();
            }
        });
        $('#add-user-model').modal('hide');
    }

    function deleteUser(id){
        $.ajax({
            url:"delete.php",
            type:'post',
            data:{
                id:id
            },
            success:function(data,status){
                displayData();
            }
        });
    }


    //Update
    function showUserDetails(id){
        $('#hidden').val(id);
        $.post("get.php",{id:id},function(data,status){
            const id =JSON.parse(data);
            $('name').val(id.name);
            $('email').val(id.email);
            $('mobile').val(id.mobile);
            $('address').val(id.address);

        const name= $('#update-name').val(id.name);
        const email= $('#update-email').val(id.email);
        const mobile= $('#update-mobile').val(id.mobile);
        const address= $('#update-address').val(id.address);
        });
    }

    function updateUser(){
        const name= $('#update-name').val();
        const email= $('#update-email').val();
        const mobile= $('#update-mobile').val();
        const address= $('#update-address').val();
        const id = $('#hidden').val();
        $.ajax({
            url:"update.php",
            type:'post',
            data:{
                id:id,
                name: name,
                email: email,
                mobile: mobile,
                address: address,
            },
            success:function(data,status){
                displayData();
            }
        });
        $('#update-modal').modal('hide');
    }

</script>

<!-- don't know why external js does not work for phpmyadmin localhost -->
<!-- <script src="js/script.js"></script> -->

<!-- bootstrap javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>