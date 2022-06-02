
        <?php include("customerheader.php") ?>
        <div class="d-flex justify-content-center align-items-center"> 
            <div class="login-form-bg h-100 w-75">
                <div class="container mt-5 h-100">
                    <div class="row justify-content-center h-100">
                        <div class="col-xl-6">
                            <div class="form-input-content">
                                <div class="card login-form mb-0">
                                    <div class="card-body pt-5 shadow h-100 d-flex flex-column justify-content-center align-items-center">                       
                                        <h4 class="text-center">Sửa thông tin</h4>
                                        @error('avatar')
                                        <h6 class="text-center text-danger">{{$message}}</h6>
                                        @enderror
                                        @error('name')
                                        <h6 class="text-center text-danger">{{$message}}</h6>
                                        @enderror
                                        @error('address')
                                        <h6 class="text-center text-danger">{{$message}}</h6>
                                        @enderror
                                        <form action='/ChangeInfo' method='post' enctype="multipart/form-data" class="text-center">
                                            @csrf
                                            <div style='text-align:center'>
                                                <img id='avatar' src="{{URL::asset(Session::get('avatar'))}}" alt='Đã thêm ảnh' style='width: 50%; height: 50%;'>
                                            </div>
                                            <div style='text-align:center'>
                                                <input type="file" name="avatar" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple required />
                                                <label class='file_label' for="file">Thay ảnh</label>
                                            </div>
                                            <br>
                                            <input  type='text' name='name' placeholder="Họ và tên" value="{{Session::get('name')}}" required>
                                            <input  type='text' name='address' placeholder="Địa chỉ" value="{{Session::get('address')}}" required>
                                            <div class='text-center m-2'><button type='submit' class='btn btn-info'>Sửa</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.inputfile').change(function(){
                let file_path = $(this).val();
                file_path = file_path.split("\\");
                let file_name = file_path[file_path.length-1];
                let path = "{{URL::asset('upload/')}}";
                path += '/' + file_name;
                $('#avatar').attr('src',path);
            });

            // input file
            var inputs = document.querySelectorAll( '.inputfile' );
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
    </body>
</html>