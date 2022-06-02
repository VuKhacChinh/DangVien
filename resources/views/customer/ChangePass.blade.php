
        <?php include("customerheader.php") ?>
        <div style="margin-top:100px"> 
        <div class="login-form-bg h-100">
                <div class="container mt-5 h-100">
                    <div class="row justify-content-center h-100">
                        <div class="col-xl-6">
                            <div class="form-input-content">
                                <div class="card login-form mb-0">
                                    <div class="card-body pt-5 shadow">                       
                                            <h4 class="text-center">Đổi mật khẩu</h4>
                                            <form name='change-pass-form' method="POST" action="/ChangePass" onsubmit="return validateForm()">
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label >Mật khẩu cũ : </label>
                                                    <input id='old_pass' type="password" name="old_pass" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label >Mật khẩu mới : </label>
                                                    <input id='new_pass' type="password" name="new_pass" class="form-control" required>

                                                </div>
                                                <div class="form-group">
                                                    <label >Nhập lại mật khẩu mới : </label>
                                                    <input id='confirm_pass' type="password" name="confirm_pass" class="form-control" required>

                                                </div>
                        
                                                <div class="btn-toolbar justify-content-center p-3" role="toolbar" aria-label="Toolbar with button groups">
                                                    <div class="btn-group">
                                                        <input id='change-pass' type="submit" value="Thay đổi" class="btn btn-primary w-20 " name="save_changes">        
                                                    </div>
                                                </div>
                                                <h5 id="error-form" class="text-danger text-center"></h5>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function validateForm(){
            let old_pass = document.forms['change-pass-form']['old_pass'].value;
            let new_pass = document.forms['change-pass-form']['new_pass'].value;
            let confirm_pass = document.forms['change-pass-form']['confirm_pass'].value;
            if(old_pass==""||new_pass==""||confirm_pass==""){
                $('#error-form').html("Không được để trống");
                return false;
            }
            if(new_pass!=confirm_pass){
                $('#error-form').html("Mật khẩu nhập lại không khớp");
                return false;
            }
            if(CryptoJS.MD5(old_pass) != "{{Session::get('password')}}"){
                $('#error-form').html("Mật khẩu không đúng");
                return false;
            }
            return true;
        }

    </script>
</html>