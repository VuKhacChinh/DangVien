<?php include("userHeader.php") ?>
            <div class="d-flex flex-column align-items-center bg-light" style="width:50%; margin-left: auto; margin-right: auto; margin-top: 10px;">
                <div class="text-start w-100 m-3">
                    <h3 class="text-center text-primary p-1" style="border-bottom: 2px solid orange">Thông tin đảng viên</h3>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Họ và tên</span>: {{$user->name}}</div>
                        <div class="col-6"><span class="fw-bold">Giới tính</span>: {{$user->sex}}</div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Ngày sinh</span>: {{$user->birthday}}</div>
                        <div class="col-6"><span class="fw-bold">Quê quán</span>: {{$user->address}}</div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Địa chỉ thường trú</span>: {{$user->address2}}</div>
                        <div class="col-6"><span class="fw-bold">Dân tộc</span>: {{$user->ethnic}}</div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Tôn giáo</span>: {{$user->religion}}</div>
                        <div class="col-6">
                            <span class="fw-bold">Trạng thái</span>:
                            @if($user->state==0)
                                Đảng ủy khác
                            @elseif($user->state==1)
                                Đang hoạt động
                            @else
                                Dự bị
                            @endif
                        </div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Chức vụ đảng</span>: {{$user->class}}</div>
                    </div>
                </div>
                <div class="text-start w-100 m-3">
                    <h3 class="text-center text-primary p-1" style="border-bottom: 2px solid orange">Trình độ học vấn</h3>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Chuyên ngành</span>: {{$user->major}}</div>
                        <div class="col-6"><span class="fw-bold">Nghề nghiệp</span>: {{$user->job}}</div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Trình độ tin học</span>: {{$user->IT}}</div>
                        <div class="col-6"><span class="fw-bold">Trình độ ngoại ngữ</span>: {{$user->Eng}}</div>
                    </div>
                    <div class="row w-100 m-4">
                        <div class="col-6"><span class="fw-bold">Trình độ LLCT</span>: {{$user->phylo}}</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>