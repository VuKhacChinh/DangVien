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
    <body style='background-color: #efefef; height: 100vh'>
    <style>
        .list_func:hover{
                background-color: purple;
                color: white;
            }
    </style>
        <div id='header' class="d-flex" style="height:7vh; background-image: linear-gradient(to left, black, purple)">
            <h2 class="text-center text-light m-auto">
                <span style="position:fixed; right:20px;" class="h6" >
                    <span>Xin chào <?php echo Session::get('username') ?></span>
                </span>
            </h2>
        </div>
        <div class="d-flex align-items-stretch" style="height:90vh; overflow-y: scroll">
            <div style="width:15%; position: fixed; height: 100%;" class="d-flex flex-column bg-light">
                <a href="/Home" class="list_func p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-tasks-alt text-warning"></i> Xem hồ sơ
                </a>
                <a href="/UserMessenger" class="list_func p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-comments text-info"></i> Nhắn tin với bí thư
                </a>
                <a href="/Notify" class="list_func p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-bells" style="color:purple"></i> Xem thông báo
                </a>
                <a href="/ChangePass" class="list_func p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-cog text-success"></i> Đổi mật khẩu
                </a>
                <a href="/SignOut" class="list_func p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-sign-out-alt text-danger"></i> Đăng xuất
                </a>
            </div>
