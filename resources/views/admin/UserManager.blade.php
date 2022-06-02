<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='index.css' rel='stylesheet' />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body style='background-color: #efefef'>
    <style>
        .avatar:hover{
            border: 1px solid green;
        }
    </style>
        <div id='header' class="d-flex bg-dark border border-5 border-dark">
            <img src="{{URL::asset('images/adminLogo.jpg')}}" style="width: 100px; height: 100px"/>
            <h2 class="text-center text-warning m-auto">Trang quản trị
                    <span style="position:fixed; right:20px; margin-bottom:" class="h6" >
                        <span>Xin chào {{Session::get('username') }}</span>
                        <a href="/SignOut" class="list_func bg-danger text-light p-1" style="display:block; text-decoration:none" >
                            <i class="fas fa-sign-out-alt text-light"></i> 
                        </a>
                    </span>
            </h2>
        </div>
        <div class="d-flex justify-content-around m-3">
            <a href="/UserManager" class="btn btn-primary">Quản lý người dùng</a>
            <a href="/ResManager" class="btn btn-success">Quản lý nhà hàng</a>
            <a href="/AdminManager" class="btn btn-warning" <?php if(Session::get('username')!="admin") echo "style='display:none;'" ?>>Quản lý quản trị viên</a>
        </div>
        <div class="w-75 m-auto d-flex">
            <table class="table table-dark table-hover text-light text-center">
                <thead class="text-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Tài khoản</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Khóa|Mở khóa</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    foreach($users as $user){ 
                    ?>
                        <tr>
                            <td scope="row">{{$user->iduser}}</td>
                            <td><img src="{{URL::asset($user->avatar)}}" style="width:50px; height: 50px; border-radius: 50%"/></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <button class="btn <?php if($user->active==1) echo "btn-danger"; else echo "btn-success"; ?> lock" value="{{$user->iduser}}">
                                    <?php if($user->active==1) echo "Khóa"; else echo "Mở khóa"; ?>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
		</div>
        <script>
            $('.lock').click(function(){
                let e = $(this);
                let active = 0;
                let newText = "Mở khóa";
                let newClass = "btn btn-success lock";
                let iduser = parseInt(e.val());
                
                let text = e.html();
                if(text.includes('M')){ // mở khóa
                    active = 1;
                    newText = "Khóa";
                    newClass = "btn btn-danger lock";
                }
                let data = {
                    'active': active,
                    'iduser': iduser,
                    'type': "user",
                }
                $.get('/Ajax/ClockFunc',data, function(data){
                    e.html(newText);
                    e.attr('class', newClass);
                });
            });
        </script>
    </body>
</html>