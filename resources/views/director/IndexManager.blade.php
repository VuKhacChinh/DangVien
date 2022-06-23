<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:50%; margin-left: auto; margin-right: auto">
                <div class="text-center m-2 d-flex justify-conten-center">
                    <input type="text" id="add" class="m-1"/>
                    <button id="add_btn" class="btn btn-success m-1">Thêm</button>
                </div>
                <table class="text-center bg-light">
                    <tr style="border-bottom: 1px solid black">
                        <th class="w-75">Tên</th>
                        <th class="w-25">Thao tác</th>
                    </tr>
                    
                    @foreach($data['indexs'] as $index)
                        <tr style="border-bottom: 1px solid black">
                            <td class="w-75">{{$index->name}}</td>
                            <td class="w-25 d-flex align-items-center">
                                <button class="delete btn btn-danger m-1" value="{{$index->id}}"><i class="far fa-trash-alt"></i></button>
                                <button class="edit btn btn-success m-1" value="{{$index->id}}"><i class="fas fa-pen"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <script>
            $(".edit").click(function(){
                let e = $(this);
                let id = e.val();
                let data = e.parent().prev();
                let editdata = prompt("Nhập thông tin chỉnh sửa",data.html());
                if(editdata && editdata!=data.html()){
                    let data = {
                        name: editdata,
                        id: id,
                        type: "{{$data['type']}}"
                    }
                    $.get('/Ajax/EditIndex', data, function(){
                        window.location.reload();
                    });
                }
            });

            $('.delete').click(function(){
                let isDelete = confirm("Bạn có muốn xóa?");
                if(!isDelete) return;
                let e = $(this);
                let id = parseInt(e.val());
                
                let data = {
                    'id': id,
                    type: "{{$data['type']}}"
                }
                $.get('/Ajax/DeleteIndex',data, function(data){
                    window.location.reload();
                });
            });

            $("#add_btn").click(function(){
                let e = $("#add");
                let name = e.val();
                if(name=="") return;
                let data = {
                        name: name,
                        type: "{{$data['type']}}"
                    }
                $.get('/Ajax/AddIndex', data, function(){
                    window.location.reload();
                });
            });
        </script>
    </body>
</html>