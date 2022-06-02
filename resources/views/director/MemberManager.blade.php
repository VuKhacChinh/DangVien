<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:80%; margin-left: 18%">
                <div class="text-center m-2"><a href="/AddMember" class="btn btn-outline-info">Thêm đảng viên</a></div>
                <table class="table table-dark table-hover text-light text-center">
                    <thead class="text-info">
                        <tr>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Quê quán</th>
                            <th scope="col">Địa chỉ thường trú</th>
                            <th scope="col">Dân tộc</th>
                            <th scope="col">Tôn giáo</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Long</td>
                                <td>14/08/2000</td>
                                <td>Nam</td>
                                <td>Hà Nội</td>
                                <td>Hoàng Main, Hà Nội</td>
                                <td>Kinh</td>
                                <td>Không</td>
                                <td>
                                    <select class="bg-primary text-light p-1">
                                        <option>
                                            Đang hoạt động
                                        </option>
                                        <option>
                                            Đảng ủy khác
                                        </option>
                                    </select>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a class="more btn btn-success m-1" href="/Information">Chi tiết</a>
                                    <form action="/EditFood" class="m-1">
                                        <input type='hidden' value="1" name='idfood'/>
                                        <button class="edit btn btn-info">Sửa</button>
                                    </form>
                                </td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $('.delete').click(function(){
                let isDelete = confirm("Bạn có muốn xóa?");
                if(!isDelete) return;
                let e = $(this);
                let idfood = parseInt(e.val());
                
                let data = {
                    'idfood': idfood,
                }
                $.get('/Ajax/FoodDelete',data, function(data){
                    window.location.reload();
                });
            });
        </script>
    </body>
</html>