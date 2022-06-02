<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:50%; margin-left: auto; margin-right: auto">
                <div class="text-center m-2 d-flex justify-conten-center">
                    <input type="text" class="m-1"/>
                    <button class="btn btn-info m-1">Thêm</button>
                </div>
                <table class="text-center bg-light">
                    <tr style="border-bottom: 1px solid black">
                        <th class="w-75">Tên</th>
                        <th class="w-25">Xóa|Sửa</th>
                    </tr>
                    
                    <tr id="1" style="border-bottom: 1px solid black">
                        <td class="w-75">Mường</td>
                        <td class="w-25 d-flex align-items-center">
                            <button class="delete btn btn-danger m-1" value="1">Xóa</button>
                            <button class="edit btn btn-primary m-1" value="1">Sửa</button>
                        </td>
                    </tr>
                    <tr id="2" style="border-bottom: 1px solid black">
                        <td class="w-75">Kinh</td>
                        <td class="w-25 d-flex align-items-center">
                            <button class="delete btn btn-danger m-1" value="1">Xóa</button>
                            <button class="edit btn btn-primary m-1" value="1">Sửa</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <script>
            $(".edit").click(function(){
                let e = $(this);
                let data = e.parent().prev();
                let editdata = prompt("Nhập thông tin chỉnh sửa",data.html());
                if(editdata && editdata!=data.html()){
                    alert(editdata);
                    data.html(editdata);
                }
            });
        </script>
    </body>
</html>