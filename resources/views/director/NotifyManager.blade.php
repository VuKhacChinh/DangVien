<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:80%; margin-left: 18%">
                <div class="d-flex flex-column align-items-center m-2">
                    <textarea id="add" type="text" name="notify" cols="50" rows="5"></textarea>
                    <button id="add_btn" class="btn btn-success m-1">Thêm thông báo</button>
                </div>
                @foreach($notifys as $notify)
                    <div class="bg-light row m-1 w-75 d-flex align-items-center">
                        <span class="col-3" style="border-right: 1px solid #898989">Ngày <span class="text-success">{{$notify->time}}</span></span>
                        <span class="col-6" style="border-right: 1px solid #898989">{{$notify->content}}</span>
                        <span class="col-3 d-flex justify-content-center">
                            <button class="btn btn-danger delete m-1" value="{{$notify->idnotify}}"><i class="far fa-trash-alt"></i></button>
                            <button class="edit btn btn-success m-1" value="{{$notify->idnotify}}"><i class="fas fa-pen"></i></button>
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
        <script>
            $(".edit").click(function(){
                let e = $(this);
                let idnotify = e.val();
                let data = e.parent().prev();
                let editdata = prompt("Nhập thông tin chỉnh sửa",data.html());
                if(editdata && editdata!=data.html()){
                    let data = {
                        content: editdata,
                        idnotify: idnotify
                    }
                    $.get('/Ajax/EditNotify', data, function(){
                        window.location.reload();
                    });
                }
            });

            $('.delete').click(function(){
                let isDelete = confirm("Bạn có muốn xóa?");
                if(!isDelete) return;
                let e = $(this);
                let idnotify = parseInt(e.val());
                
                let data = {
                    'idnotify': idnotify,
                }
                $.get('/Ajax/DeleteNotify',data, function(data){
                    window.location.reload();
                });
            });

            $("#add_btn").click(function(){
                let e = $("#add");
                let content = e.val();
                if(content=="") return;
                let data = {
                        content: content
                    }
                $.get('/Ajax/AddNotify', data, function(){
                    window.location.reload();
                });
            });
        </script>
    </body>
</html>