<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='index.css' rel='stylesheet' />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.4.1/socket.io.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body style='background-color: #efefef; height: 100vh; overflow-y: hidden'>
<style>
    * {
        box-sizing: border-box;
    }
    #changeinfor{
        min-height:320px;
        margin: auto;
        margin-top: 200px;
    }

    #changeinfor legend{
        color: blue;
    }

    #changeinfor label{
        color: red;
        font-weight: bold;
        font-size: 110%;
    }

    #changeinfor input[type='text']{
        height: 30px;
        display: block;
        width: 100%;
        border: 1px solid blue;
    }

    #changeinfor button{
        padding: 5px;
        margin: 5px;
        background-color: blue;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .file_label{
        margin-top: 5px;
        padding: 5px;
        font-size: 1.25em;
        font-weight: 700;
        color: #fff;
        background-color: purple;
        display: inline-block;
        cursor: pointer;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        background-color: #191970;
    }

    .activation{
        background-color: blue;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class='header container-fluid bg-info bg-gradient position-fixed top-0'>
    <div class='row'>
        <div class='col-3 p-1'>
            <form action="/SearchRestaurant" class="d-flex">
                <input name="key" class="form-control me-2" type="search" placeholder="Tìm kiếm nhà hàng" aria-label="Search">
                <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class='col p-1 text-center d-grid gap-2'>
            <a id="home" class='btn btn-primary' href='/Home'><i class="fas fa-home"></i></a>
        </div>
        <div class='col p-1 text-center d-grid gap-2'>
            <a id="notifycation" class='btn btn-primary ' href='/Notification'><i class="fas fa-bells"></i></a>
        </div>
        <div class='col p-1 text-center d-grid gap-2'>
            <button id="messenger" class='btn btn-primary'><i class="fab fa-facebook-messenger"></i></button>
        </div>
        <div id="user_info" class='col-2 d-flex justify-content-center align-items-center p-0'>
                <img src="<?php echo URL::asset(Session::get('avatar')); ?>" class='fluid-image' style='width: 30px; height: 30px; border-radius: 50%'/> 
                <span class='p-1 text-light'><?php echo Session::get('name'); ?></span>
                <div id="use_info_func" class="text-center" style="position: absolute; top: 45px; right:0; width:285px; display: none;">
                    <a href="/ChangePass" class="list_func bg-info text-light" style="display:block; padding: 10px; text-decoration:none" ><i class="fas fa-wrench text-success"></i> Đổi mật khẩu</a>
                    <a href="/ChangeInfo" class="list_func bg-info text-light" style="display:block; padding: 10px; text-decoration:none" ><i class="fas fa-pencil-alt text-warning"></i> Sửa thông tin</a>
                    <a href="/SignOut" class="list_func bg-info text-light" style="display:block; padding: 10px; text-decoration:none" ><i class="fas fa-sign-out-alt text-danger"></i> Đăng xuất</a>
                </div>
        </div>
    </div>
</div>
<br/><br/>
<script>
    $('#messenger').click(function(){
        $.get('/Ajax/getLastTeam',function(data){
            if(data==-1){
                alert('Bạn chưa có nhóm');
                return;
            }
            window.location.href = "/Messenger/" + data;
        })
    });

    $("#user_info").mouseenter(function() {
        $('#use_info_func').css({'display':'block'});
    }).mouseleave(function() {
        $('#use_info_func').css({'display':'none'});
    });

    $(".list_func").mouseenter(function() {
        $(this).attr('class', 'list_func bg-primary text-light');
    }).mouseleave(function() {
        $(this).attr('class', 'list_func bg-info text-light');
    });

</script>