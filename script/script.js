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

