<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<!-- Head -->
<head>

<title>Đăng nhập</title>

<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

<!-- Fonts -->
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body style="height: 100vh; overflow-y: hidden">

	<h1>Mạng xã hội đồ ăn</h1>

	<div class="w3layoutscontaineragileits d-flex flex-column algin-items-center justify-content-center">
	    <h2>FoodNet</h2>
		<form action="checkPassword" method="post" class="w-100">
		@csrf
			<input type="text" Name="username" placeholder="Tên tài khoản" required="">
			<input type="password" Name="password" placeholder="Mật khẩu" required="">
			<ul class="agileinfotickwthree">
				<li class="text-center d-flex justify-content-around">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="user" checked>
						<label class="form-check-label text-light" for="flexRadioDefault1">
							Khách hàng
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="type" value="admin" id="flexRadioDefault2">
						<label class="form-check-label text-light" for="flexRadioDefault2">
							Quản trị viên
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="type" value="res" id="flexRadioDefault3">
						<label class="form-check-label text-light" for="flexRadioDefault3">
							Nhà hàng
						</label>
					</div>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls p-3">
				<input type="submit" value="Đăng nhập">
				<p class="w-100 row align-items-center"><span class="col-8">Khách hàng chưa có tài khoản:</span> <a class="col-4" href="/SignUp"> Đăng kí</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
    <p id="warning" class="h4 text-warning text-center">
    <?php
        if(Session::has('login_mess')){
            echo Session::get('login_mess');
            Session::forget('login_mess');
        }
    ?>
    </p>
	

	<!-- pop-up-box-js-file -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		
        setTimeout(function(){
            $('#warning').remove();
        },3000);
	</script>

</body>
<!-- //Body -->

</html>
