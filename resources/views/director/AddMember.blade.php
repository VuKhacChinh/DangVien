<?php include('managerHeader.php') ?>
            <div class="d-flex justify-content-center align-items-center m-5 p-5 text-center" style="width: 100%;">
                <fieldset style="margin-top: 30vh" class='bg-light p-5 w-50'>
                    <legend class="text-center text-info">Thêm đảng viên</legend>
                    <form action='/AddMember' method='post'>
                        @csrf
                        <div class="d-flex flex-column justify-content-between">
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Họ và tên</label>
                                <input class="col-9" type='text' name='name' required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Ngày sinh</label>
                                <input class="col-9" type='date' name='birthday' required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Quê quán</label>
                                <input class="col-9" type='text' name='address' required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Địa chỉ thường trú</label>
                                <input class="col-9" type='text' name='address2' required>
                            </div>
                            <div>
                                <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Nghề nghiệp</label>
                                <input type="text" class="col-9" name="job" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Dân tộc</label>
                                <input type="text" class="col-9" name="ethnic" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Tôn giáo</label>
                                <input type="text" class="col-9" name="religion" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Chức vụ đảng</label>
                                <select class="col-9" name="idclass">
                                    @foreach($data['classes'] as $class)
                                        <option value="{{$class->idclass}}">{{$class->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Giới tính</label>
                                <div class="col-9 d-flex justify-content-around">
                                    <div>
                                        <input type="radio" name="sex" value="Nam" checked="check">
                                        <label for="sex">Nam</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="sex" value="Nữ">
                                        <label for="sex">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-info">Học vấn</h3>
                            <div>
                                <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Chuyên ngành</label>
                                <select class="col-9" name="idmajor">
                                    @foreach($data['majors'] as $major)
                                        <option value="{{$major->idmajor}}">{{$major->major}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ tin học</label>
                                <input type="text" class="col-9" name="IT" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ ngoại ngữ</label>
                                <input type="text" class="col-9" name="Eng" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ LLCT</label>
                                <input type="text" class="col-9" name="phylo" required>
                            </div>
                            <h3 class="text-info">Tài khoản</h3>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Tên tài khoản</label>
                                <input type="text" class="col-9" name="username" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Mật khẩu</label>
                                <input type="password" class="col-9" name="password" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Nhập lại mật khẩu</label>
                                <input type="password" class="col-9" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class='text-center m-2'><button type='submit' name='btnsuathongtin' class='btn btn-info'>Thêm</button></div>
                    </form>
                </fieldset>
            </div>
        </div>
    </body>

    <script>
    $('.avatar').change(function(){
        let file_path = $(this).val();
        file_path = file_path.split("\\");
        let file_name = file_path[file_path.length-1];
        let path = "{{URL::asset('upload/')}}";
        path += '/' + file_name;
        $('#avatar').attr('src',path);
    });

    // input file
    var inputs = document.querySelectorAll( '.avatar' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });
</script>

</html>