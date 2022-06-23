<?php include("userHeader.php") ?>
            <div class="d-flex flex-column align-items-center" style="width:80%; margin-left: 18%">
                @foreach($notifys as $notify)
                    <div class="bg-light row m-2 p-3 w-75 d-flex align-items-center">
                        <span class="col-3" style="border-right: 1px solid #898989">Ngày <span class="text-primary">{{$notify->time}}</span></span>
                        <span class="col-9">{{$notify->content}}</span>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">{{$notifys->links()}}</div>
            </div>
        </div>
    </body>
</html>