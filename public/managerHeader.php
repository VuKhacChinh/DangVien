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
            .avatar {
                width: 0.1px;
                height: 0.1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1;
            }

            .file_label{
                padding: 3px;
                font-size: 1.25em;
                font-weight: 700;
                color: #fff;
                background-color: blue;
                display: inline-block;
                cursor: pointer;
            }

            .avatar:focus + label,
            .avatar + label:hover {
                background-color: purple;
            }

            .list_func:hover{
                background-color: green;
            }

        </style>
        
        <div id='header' class="d-flex bg-success" style="height:7vh">
            <h2 class="text-center text-light m-auto">Quản lý đảng viên
                <span style="position:fixed; right:20px;" class="h6" >
                    <span>Xin chào <?php echo Session::get('username') ?></span>
                </span>
            </h2>
        </div>
        <div class="d-flex align-items-stretch" style="height:90vh; overflow-y: scroll">
            <div style="width:15%; position: fixed; height: 100%;" class="d-flex flex-column bg-dark">
                <a href="/MemberManager" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-tasks-alt text-primary"></i> Quản lý đảng viên
                </a>
                <button id="btn_category" class="list_func text-start text-light p-2 m-1 btn btn-dark" style="display:block; text-decoration:none" >
                    <i class="fas fa-indent text-warning"></i> Quản lý danh mục
                </button>
                <div id="category" style="display:block; padding-left: 20px;">
                    <a href="/IndexManager/1" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                        <i class="fas fa-horizontal-rule text-warning m-1"></i>Chức vụ đảng
                    </a>
                    <a href="/IndexManager/2" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                        <i class="fas fa-horizontal-rule text-warning m-1"></i>Chuyên ngành
                    </a>
                </div>
                <a href="/ListChat" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-comments text-info"></i> Tin nhắn
                </a>
                <a href="/NotifyManager" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-bells" style="color:purple"></i> Thông báo
                </a>
                <a href="/ChangePass" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-cog" style="color: pink"></i> Đổi mật khẩu
                </a>
                <a href="/SignOut" class="list_func text-light p-2 m-1" style="display:block; text-decoration:none" >
                    <i class="fas fa-sign-out-alt text-danger"></i> Đăng xuất
                </a>
            </div>

            <script>
                $("#btn_category").click(function(){
                    let display = $("#category").css("display");
                    if(display=='none'){
                        $("#category").css({"display":"block"});
                    }
                    else{
                        $("#category").css({"display":"none"});
                    }
                });
            </script>