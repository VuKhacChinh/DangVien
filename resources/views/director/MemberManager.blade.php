<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:80%; margin-left: 18%">
                <div class="text-center m-2"><a href="/AddMember" class="btn btn-success">Thêm đảng viên</a></div>
                <table class="table table-light table-hover text-dark text-center">
                    <thead class="text-success">
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
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->sex}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->address2}}</td>
                                <td>{{$user->ethnic}}</td>
                                <td>{{$user->religion}}</td>
                                <td>
                                    @if($user->state==0)
                                        Đangr ủy khác
                                    @elseif($user->state==1)
                                        Đang hoạt động
                                    @else
                                        Dự bị
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a class="more btn btn-primary m-1" href="/Information/{{$user->iduser}}"><i class="fas fa-eye"></i></a>
                                    <form action="/EditMember" class="m-1">
                                        <input type='hidden' value="{{$user->iduser}}" name='iduser'/>
                                        <button class="edit btn btn-success"><i class="fas fa-pen"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>