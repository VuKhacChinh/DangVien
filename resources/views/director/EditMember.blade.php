<?php include('managerHeader.php') ?>
    <?php
        $user = $data['user'];
    ?>
            <div class="d-flex justify-content-center align-items-center m-5 p-5 text-center" style="width: 100%;">
                <fieldset style="margin-top: 30vh" class='bg-light p-5 w-50'>
                    <legend class="text-center text-info">Thêm đảng viên</legend>
                    <form action='/EditMember' method='post'>
                        @csrf
                        <div class="d-flex flex-column justify-content-between">
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Họ và tên</label>
                                <input class="col-9" type='text' name='name' value="{{$user->name}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Ngày sinh</label>
                                <input class="col-9" type='date' name='birthday' value="{{$user->birthday}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Quê quán</label>
                                <input class="col-9" type='text' name='address' value="{{$user->address}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Địa chỉ thường trú</label>
                                <input class="col-9" type='text' name='address2' value="{{$user->address2}}" required>
                            </div>
                            <div>
                                <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Nghề nghiệp</label>
                                <input type="text" class="col-9" name="job" value="{{$user->job}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Dân tộc</label>
                                <input type="text" class="col-9" name="ethnic" value="{{$user->ethnic}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Tôn giáo</label>
                                <input type="text" class="col-9" name="religion" value="{{$user->religion}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Chức vụ đảng</label>
                                <select class="col-9" name="idclass">
                                    @foreach($data['classes'] as $class)
                                        <option value="{{$class->idclass}}" <?php if($user->idclass==$class->idclass) echo "selected";?>>{{$class->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Giới tính</label>
                                <div class="col-9 d-flex justify-content-around">
                                    <div>
                                        <input type="radio" name="sex" value="Nam" <?php if($user->sex=="Nam") echo "checked='check'";?>>
                                        <label for="sex">Nam</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="sex" value="Nữ" <?php if($user->sex=="Nữ") echo "checked='check'";?>>
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
                                        <option value="{{$major->idmajor}}" <?php if($user->idmajor==$major->idmajor) echo "selected";?> >{{$major->major}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ tin học</label>
                                <input type="text" class="col-9" name="IT" value="{{$user->IT}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ ngoại ngữ</label>
                                <input type="text" class="col-9" name="Eng" value="{{$user->Eng}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ LLCT</label>
                                <input type="text" class="col-9" name="phylo" value="{{$user->phylo}}" required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trạng thái</label>
                                <select class="col-9" name="state">
                                    <option value="0" <?php if($user->state==0) echo "selected";?> >Đảng ủy khác</option>
                                    <option value="1" <?php if($user->state==1) echo "selected";?> >Đang hoạt động</option>
                                    <option value="2" <?php if($user->state==2) echo "selected";?> >Dự bị</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="iduser" value="{{$user->iduser}}"/>
                        <div class='text-center m-2'><button type='submit' name='btnsuathongtin' class='btn btn-info'>Sửa</button></div>
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