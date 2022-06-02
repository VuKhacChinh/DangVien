<?php include('managerHeader.php') ?>
            <div class="d-flex justify-content-center align-items-center m-5 text-center" style="width: 100%">
                <fieldset class='dangnhap bg-light p-5 w-50'>
                    <legend class="text-center text-info">Thêm đảng viên</legend>
                    <form action='/AddFood' method='post'>
                        <div class="d-flex flex-column justify-content-between">
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Họ và tên</label>
                                <input class="col-9" type='text' name='name' required>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Ngày sinh</label>
                                <input class="col-9" type='date' name='date' required>
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
                                <select class="col-9">
                                    <option>Không</option>
                                    <option>Bác sĩ</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Dân tộc</label>
                                <select class="col-9">
                                    <option>Kinh</option>
                                    <option>Mường</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Tôn giáo</label>
                                <select class="col-9">
                                    <option>Không</option>
                                    <option>ABCD</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Chức vụ đảng</label>
                                <select class="col-9">
                                    <option>Đảng viên</option>
                                    <option>Mường</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Nhiệm kì</label>
                                <select class="col-9">
                                    <option>2015-2020</option>
                                    <option>2010-2015</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Giới tính</label>
                                <div class="col-9 d-flex justify-content-around">
                                    <div>
                                        <input type="radio" name="sex" value="1" checked="check">
                                        <label for="sex">Nam</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="sex" value="0">
                                        <label for="sex">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-info">Học vấn</h3>
                            <div>
                                <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Chuyên ngành</label>
                                <select class="col-9">
                                    <option>CNTT</option>
                                    <option>TĐH</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ tin học</label>
                                <select class="col-9">
                                    <option>Không</option>
                                    <option>A</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ ngoại ngữ</label>
                                <select class="col-9">
                                    <option>Không</option>
                                    <option>A</option>
                                </select>
                            </div>
                            <div class="row border border-secondary p-1 m-1">
                                <label class="col-3">Trình độ LLCT</label>
                                <select class="col-9">
                                    <option>Không</option>
                                    <option>A</option>
                                </select>
                            </div>
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