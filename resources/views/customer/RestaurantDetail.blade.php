
        <?php include("customerheader.php") ?>
        <?php
            $flag =  $res['flag'];
            $res = $res['res'];
        ?>
            <div class='d-flex flex-column justify-content-center align-items-center'>
                <div class="row bg-dark p-2 justify-content-around align-items-center " style="width: 75%; margin-top:10px;">
                    <a href="/RestaurantDetail/{{$res->idres}}" class="m-1 col-2 btn btn-outline-info">Nhà hàng</a>
                    <a href="/RestaurantFood/{{$res->idres}}" class="m-1 col-2 btn btn-outline-info">Món ăn</a>
                    <button value =  
                    "<?php if($flag==-1) echo 'red';
                    else echo 'white';
                    ?>" class='heart col-2 bg-dark border border-0'><i class="fas fa-heart" style="font-size: 170%; color: 
                    <?php if($flag==-1) echo 'red';
                    else echo 'white';
                    ?>
                " 
                    ></i></button>
                    <a href="/RestaurantPromotion/{{$res->idres}}" class="m-1 col-2 btn btn-outline-info" >Ưu đãi</a>
                    <a href="/Review/{{$res->idres}}" class="m-1 col-2 btn btn-outline-info">Xem đánh giá</a>
                </div>
                <div class='d-flex flex-column justify-content-center align-items-center p-2'
                    style="background-image:url('{{URL::asset($res->avatar)}}');
                            background-repeat: no-repeat;
                            background-size: 100% 100%;
                            height: 80vh; width: 75%"
                >
                   
                    <div class='res-infor d-flex flex-column text-light align-items-center' style="text-shadow: 0 0 2px #000;">
                        <h3>{{$res->name}}</h3>
                        <h5>Địa chỉ: {{$res->address}}</h5>
                    </div>
                    <div class='quantity' style="text-shadow: 0 0 2px #fff;">
                        <div style='font-size: 200%;' class=" d-flex justify-content-center align-items-center text-warning">
                            @if($res->numreview>0)
                                {{round($res->numstar/$res->numreview,1)}}
                                <i class="fas fa-star m-1"></i>
                            @endif
                        </div>
                        <h5 class='text-success text-center' >{{$res->numreview}} lượt đánh giá</h5>
                        <h5 class='text-primary text-center' >{{$res->numlike}} lượt thích</h5>
                    </div>
                    <button id="joinTeam" class="btn text-info bg-dark m-5">Vào nhóm đi ăn</button>
                </div>
            </div>
    </body>
    <script>
        var addedNumber = {{$flag}};
        $('.heart').click(function(){
            let color = $('.fa-heart').css('color');
            if($(this).val()==="red"){
                $('.fa-heart').css({'color':'white'});
                $(this).val("white");
            }
            else{
                $('.fa-heart').css({'color':'red'});
                $(this).val("red");
            }
            let idres = {{$res->idres}};
            let iduser = {{Session::get('iduser')}};
            let data = {
                idres,
                iduser,
                addedNumber
            };
            $.get('/Ajax/likeRes',data,function(data){
                addedNumber = -addedNumber;
            });
        });

        $('#joinTeam').click(function(){
            let idres = {{$res->idres}};
            let data = {idres: idres};
            $.get('/Ajax/joinTeam',data,function(data){
                if(data==-1){
                    alert("Bạn đã vào nhóm này trước đó");
                }
                else{
                    let data2 = {
                        username: "{{Session::get('username')}}",
                        iduser: {{Session::get('iduser')}},
                        idteam: parseInt(data),
                        avatar: "{{Session::get('avatar')}}",
                        content: "đã vào nhóm",
                        type: 1
                    };
                    var socket = io('http://localhost:3000', { transports: ['websocket', 'polling', 'flashsocket'] });
                    socket.emit('message',data2);
                    setTimeout(() => {
                        window.location.href = "/Messenger/"+data;
                    }, 200);
                }
            });
        })
    </script>
</html>