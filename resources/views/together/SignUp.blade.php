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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

<!-- Fonts -->
<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body style="100vh;">

	<h1>Mạng xã hội đồ ăn</h1>
	<div class="w3layoutscontaineragileits  d-flex flex-column algin-items-center justify-content-center">
	    <h2>FoodNet</h2>
		<form action="checkSignUp" method="post">
		@csrf
			<input type="text" name="username" placeholder="Tên tài khoản( ít nhất 5 kí tự )">
			@error('username')
			<h6 class="text-danger">{{$message}}</h6>
			@enderror
			<input type="password" name="password" placeholder="Mật khẩu (ít nhất 5 kí tự )" >
			@error('password')
			<h6 class="text-danger">{{$message}}</h6>
			@enderror
			<input type="password" name="repassword" placeholder="Nhập lại mật khẩu" >
			@error('repassword')
			<h6>{{$message}}</h6>
			@enderror
			<input type="text" name="name" placeholder="Họ và tên" >
			@error('name')
			<h6 class="text-danger">{{$message}}</h6>
			@enderror
			<input type="text" name="address" placeholder="Địa chỉ">
			@error('address')
			<h6 class="text-danger">{{$message}}</h6>
			@enderror
			<div class="aitssendbuttonw3ls p-3">
				<input type="submit" value="Đăng kí">
				<p class="w-100 row align-items-center"><span class="col-8">Khách hàng có tài khoản:</span> <a class="col-4" href="/SignIn"> Đăng nhập</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	

	<!-- pop-up-box-js-file -->  
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
																		
		});
	</script>

</body>
<!-- //Body -->

</html>
