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
        <div class="w-75 m-auto">
            <div class="d-flex justify-content-around m-3">
                <a href="/UserManager" class="btn btn-primary">Quản lý người dùng</a>
                <a href="/ResManager" class="btn btn-success">Quản lý nhà hàng</a>
                <a href="/AdminManager" class="btn btn-warning" <?php if(Session::get('username')!="admin") echo "style='display:none;'" ?>>Quản lý quản trị viên</a>
            </div>
            <?php
                if(Session::has('add_err')) {
                    echo "<h3 class='text-danger text-center'>".Session::get('add_err')."</h3>";
                    Session::forget('add_err');
                }
            ?>

            @error('username')
			<h6 class="text-danger text-center">{{$message}}</h6>
			@enderror

            @error('password')
			<h6 class="text-danger text-center">{{$message}}</h6>
			@enderror

            @error('name')
			<h6 class="text-danger text-center">{{$message}}</h6>
			@enderror

            @error('confirm_pass')
			<h6 class="text-danger text-center">{{$message}}</h6>
			@enderror

            <div class="p-2 m-2 bg-dark border border-2 border-info" <?php if(Session::get('username')!="admin") echo "style='display:none;'" ?>>
                <form class="d-flex justify-content-between" action="/AddAdmin" method='post'>
                    @csrf
                    <input type="text" name="name" placeholder="Họ và tên" required/>
                    <input type="text" name="username" placeholder="Tên tài khoản" required/>
                    <input type="password" name="password" placeholder="Mật khẩu" required/>
                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required/>
                    <button id="addAdmin" class="btn btn-warning">Thêm</button>
                </form>
            </div>
            <div class="d-flex m-2">
                <table class="table table-dark table-hover text-light text-center">
                    <thead class="text-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Tài khoản</th>
                            <th scope="col">Khóa|Mở khóa</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        foreach($admins as $admin){ 
                        ?>
                            <tr>
                                <td scope="row">{{$admin->iduser}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->username}}</td>
                                <td>
                                    <?php
                                        if($admin->iduser==Session::get('iduser')) echo "<span class='text-warning'>Bạn</span>";
                                        else{
                                    ?>
                                    <button class="btn <?php if($admin->active==1) echo "btn-danger"; else echo "btn-success"; ?> lock" value="{{$admin->iduser}}" <?php if(Session::get('username')!="admin") echo "style='display:none;'" ?>>
                                        <?php if($admin->active==1) echo "Khóa"; else echo "Mở khóa"; ?>
                                    </button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
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
                    'type': "admin",
                }
                $.get('/Ajax/ClockFunc',data, function(data){
                    e.html(newText);
                    e.attr('class', newClass);
                });
            });
        </script>
    </body>
</html>