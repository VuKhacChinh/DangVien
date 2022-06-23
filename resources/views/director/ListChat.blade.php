<?php include("managerHeader.php") ?>
            <div class="d-flex flex-column align-items-center ms-auto me-auto mt-5" style="width:85%;">
            @foreach($chats as $chat)
                <div class="w-50 bg-light p-2 m-1">
                    <a href="/DirectorMessenger/{{$chat->iduser}}" class="row btn btn-outline-warning p-3 m-1 text-start text-dark w-100">
                        <span class="col-5 m-3 p-1 border border-2 border-success text-primary fw-bold">{{$chat->name}}</span>
                        <span class="col-5 m-3 p-1 text-danger fw-bold ">{{$chat->state}} tin nhắn mới</span>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </body>
</html>