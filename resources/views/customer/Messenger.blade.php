
        <?php include("customerheader.php") ?>
        <?php
            $iduser = Session::get('iduser');
        ?>
        <div class="content d-flex flex-row">
            <div id="main-navbar" style=" background-color: #fff; height: 100vh; width: 25%; position: relative; top: 0; left: 0;">
                <!-- Danh much chinh -->
                <!--
                <div class="search d-flex align-items-center" style="height: 20%;">
                    <input class="form-control border border-info text-info" type="search" placeholder="Tìm cuộc trò chuyện" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                </div>
                -->
                <div class="d-flex flex-column align-items-start " style="height: 80%; overflow-y:auto; margin-top: 50px">

                    @foreach($teams['teams'] as $team)
                    <button id="{{$team->idteam}}" class=" team btn btn-outline-info text-dark <?php if($team->idteam==$teams['idteam']) echo "bg-info";?> w-100" style="margin-bottom: 1px;">
                        <div class="d-flex align-items-center">
                            <img src='{{URL::asset($team->avatar)}}' style='width: 50px; height: 50px; border-radius: 50%;'>
                            <h6 class="m-1">{{$team->name}}</h6>
                        </div>
                    </button>
                    @endforeach
                    
                </div>
            </div>
            <!--Tin nhắn nhóm -->
            <div class='w-50 d-flex flex-column bg-light border border-1' style="height: 95vh">
                <div class="border border-1" style="height: 55px">
                    <img src="{{URL::asset($teams['team']->avatar)}}" style="width:50px; height: 50px; border-radius: 50%">
                    <span>{{$teams['team']->name}}</span>
            

                </div>
                <div id="main_conv" style="height:85% ; overflow-y:auto; margin-bottom: 50px;">
                    @foreach($teams['messages'] as $message)
                    <div class="d-flex align-items-center m-3
                        <?php 
                            if($message->type==1) echo "justify-content-center text-success ";
                            else {
                                if($message->iduser!=$iduser) echo "flex-row-reverse text-light";
                                else echo "text-light";
                            } 
                        ?>
                    ">
                        <img src="{{URL::asset($message->avatar)}}" style="width:20px; height: 20px; border-radius: 50%; margin: 3px;"/>
                        <span class="<?php if($message->type==1); else if($message->iduser==$iduser) echo "bg-primary"; else echo "bg-secondary" ?> p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">
                            <?php if($message->type==1) echo $message->username ?>
                            {{$message->content}}
                        </span>
                    </div>
                    @endforeach
                </div>
                <div class="align-items-center d-flex border border-1" style="width: 50%; height: 50px; position: fixed; bottom: 0">
                    <input id="textInput" class="form-control" style="width: 95%; border-radius: 20px;" type="text" name="question" placeholder="Nhập tin nhắn">
                    <i class="fa fa-heart" style="color:red; font-size:120%"></i>
                </div>
                <script>
                    var conversation = document.getElementById("main_conv");
                    conversation.scrollTop = conversation.scrollHeight;
                    var iduser = {{Session::get('iduser')}};
                    var idteam = {{$teams['idteam']}};
                    var socket = io('http://localhost:3000', { transports: ['websocket', 'polling', 'flashsocket'] });
                    socket.on('message', function (data) {
                        if(idteam!=data.idteam) return;
                        var img = "<img src='http://localhost/"+ data.avatar+ "' style='width:20px; height: 20px; border-radius: 50%; margin: 3px;'/>";
                        var content ="";
                        if(data.type==1){
                            content += '<div class="text-success d-flex align-items-center justify-content-center  m-3">' + img + data.username + '<span class="p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                        }
                        else{
                            if(data.iduser==iduser){
                                content += '<div class="text-light d-flex align-items-center  m-3">' + img + '<span class="bg-primary p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                            else{
                                content += '<div class="text-light d-flex flex-row-reverse align-items-center  m-3">' + img + '<span class="bg-secondary p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                        }
                        $( "#main_conv" ).append(content);
                        conversation.scrollTop = conversation.scrollHeight;
                    });
                    function getBotResponse() {
                        var rawText = $("#textInput").val();
                        if(rawText=="") return;
                        $("#textInput").val("");
                        let data = {
                            username: "{{Session::get('username')}}",
                            iduser: {{Session::get('iduser')}},
                            idteam: idteam,
                            avatar: "{{Session::get('avatar')}}",
                            content: rawText,
                            type: 0
                        }
                        this.socket.emit('message', data);
                        var date = new Date().getDate(); //Current Date
                        var month = new Date().getMonth() + 1; //Current Month
                        var year = new Date().getFullYear(); //Current Year
                        var hours = new Date().getHours(); //Current Hours
                        var min = new Date().getMinutes(); //Current Minutes
                        var sec = new Date().getSeconds(); //Current Seconds
                        var datetime = year + '-' + month + '-' + date + ' ' + hours + ':' + min + ':' + sec;
                        let data2 = {
                            iduser: {{Session::get('iduser')}},
                            idteam: idteam,
                            content: rawText,
                            time: datetime
                        }
                        $.get('/Ajax/Chat',data2);
                        
                    }
                    $("#textInput").keypress(function(e) {
                        if (e.which == 13) {
                        getBotResponse();
                        }
                    });
                </script>
            </div>

            <!-- chuc nang trong nhom -->

            <div class="d-flex flex-column" style=" width: 25%; background-color: #fff; height: 100vh;">
                <div style="border-bottom: 1px solid #ababab; margin-bottom: 2px;">
                    <button class="btn-team-function lock btn btn-<?php if($teams['team']->lock===1) echo "danger"; else echo "success" ?> text-dark border border-0 w-100" <?php if($teams['team']->idleader!=Session::get('iduser')) echo "style='display:none'"; ?>>
                        <div class="d-flex align-items-center">
                            <h6><?php if($teams['team']->lock==1) echo "Khóa nhóm"; else echo "Mở khóa nhóm" ?></h6>
                        </div>
                    </button>
                    <button class="btn-team-function order btn btn-outline-info text-dark border border-0 w-100">
                        <div class="d-flex align-items-center">
                            <h6>Đặt bàn ăn</h6>
                        </div>
                    </button>
                    <button class="btn-team-function addmember btn btn-outline-info text-dark border border-0 w-100">
                        <div class="d-flex align-items-center">
                            <h6>Thêm thành viên</h6>
                        </div>
                    </button>
                    <button class="btn-team-function members btn btn-outline-info text-dark border border-0 w-100">
                        <div class="d-flex align-items-center">
                            <h6>Xem thành viên</h6>
                        </div>
                    </button>
                    <button class="btn-team-function outofteam btn btn-outline-info text-dark border border-0 w-100">
                        <div class="d-flex align-items-center">
                            <h6>Rời nhóm</h6>
                        </div>
                    </button>
                </div>
                <div class="teamfunction text-center" style="display:none" id="order" >
                    <h4 class="bg-dark text-light">Thông tin đặt bàn</h4>
                    <div <?php if($teams['flagorder']==1&&$teams['order']->state==0||$teams['team']->idleader!=Session::get('iduser')) echo "style='display:none'"; ?>>
                    
                        <div class="time-eating m-2 bg-warning p-2">
                            <select id='hour' name='hour'>
                            <?php 
                                $hour = date("h") + 1;
                                while($hour < 22){
                                    echo "<option>".$hour."</option>";
                                    $hour++;
                                }
                            ?>
                            </select>
                            <label class="text-info">Giờ</label>
                            <select id='minute' name='minute'>
                            <?php 
                                $minute = date("i");
                                while($minute < 61){
                                    echo "<option>".$minute."</option>";
                                    $minute++;
                                }
                            ?>
                            </select>
                            <label class="text-info">Phút</label>
                            
                        </div>
                            
                        <div class="m-1">
                            <input id='phonenumber' class="p-1 border border-2 border-info w-50" type='text' placeholder="Số điện thoại"/>
                        </div>
                        <h6 id='error-phone' class="text-danger"></h6>
                        <button id='makeorder' class="btn btn-success">Đặt bàn</button>
                    </div>
                    
                    <br/>
                    <span class="text-primary display-6">
                        <?php 
                        if($teams['flagorder']==true){
                            if($teams['order']->state==0) echo "Đang chờ duyệt";
                            else {
                                if($teams['order']->state==1) echo "Đã được duyệt";
                                else {
                                    echo "Bị hủy";
                                    echo "<label>Lý do hủy</label>";
                                    echo " <span class='text-warning'>".$order->reason."</span>";
                                }
                            }
                        }
                        else echo "Chưa đặt bàn";
                        
                        ?>
                    </span>
                    <br/>
                </div>
                <div style="display:none" class="teamfunction" id="addmember">
                    <div class="d-flex border border-2 border-primary">
                        <input style="width:90%" type="text" name="iduser" placeholder="Nhập mã người dùng" class="form-control">
                        <button id='btn-addmember' class="btn btn-outline-primary" style="width:10%" type="submit"><i class="fas fa-plus"></i></button>
                    </div>
                    <h6 class='text-primary' id='add-message'></h6>
                </div>
                <div class="teamfunction" id="members" style="display: none; overflow-y:auto;">
                    <ul class="list-group">
                        <?php $idleader = $teams['team']->idleader ?>
                        @foreach($teams['members'] as $member)
                            <li class="list-group-item list-group-item-action list-group-item-light border border-0 d-flex align-items-center">
                                <div style="width:65%">
                                    <img src='{{URL::asset($member->avatar)}}' style='width: 30px; height: 30px; border-radius: 50%;'>
                                    <span>{{$member->name}}</span>
                                </div>
                                <?php
                                    if(Session::get('iduser')==$idleader&&$member->iduser != $idleader) echo "<button value='".$member->iduser."' class='expulsion btn btn-outline-danger' style='width: 35%'>Kích</button>";
                                    else if($member->iduser == $idleader) echo "<button class='btn btn-success' style='width: 35%'>Trưởng nhóm</button>";
                                ?>
                            </li>
                        @endforeach
                    </ul>
                </div>
            <div>
        </div>    
    </body>
    <script>
        $("#messenger").addClass('activation');

        $('.lock').click(function(){
                let e = $(this);
                let h6 = e.find("h6");
                let lock = 0;
                let newText = "Mở khóa nhóm";
                let newClass = "btn-team-function lock btn btn-success text-dark border border-0 w-100";
                let idteam = {{$teams['idteam']}};
                
                let text = h6.html();
                if(text.includes('M')){ // mở khóa
                    lock = 1;
                    newText = "Khóa nhóm";
                    newClass = "btn-team-function lock btn btn-danger text-dark border border-0 w-100";
                }
                let data = {
                    'lock': lock,
                    'idteam': idteam,
                    'type': "team",
                }
                $.get('/Ajax/ClockFunc',data, function(data){
                    h6.html(newText);
                    e.attr('class', newClass);
                });
            });

        $('.order').click(function(){
            $('.btn-team-function').attr('class', 'btn-team-function order btn btn-outline-info text-dark border border-0 w-100');
            var e = $(this);
            e.attr('class', 'btn-team-function order btn btn-info text-dark border border-0 w-100' );
            $('.teamfunction').css('display','none');
            $('#order').css('display','block');
        });

        $('.addmember').click(function(){
            $('.btn-team-function').attr('class', 'btn-team-function order btn btn-outline-info text-dark border border-0 w-100');
            var e = $(this);
            e.attr('class', 'btn-team-function order btn btn-info text-dark border border-0 w-100' );
            $('.teamfunction').css('display','none');
            $('#addmember').css('display','block');
        });

        $('#addmember').delegate('#btn-addmember','click',function(){
            let e = $(this);
            let iduser = e.prev().val();
            let idteam = {{$teams['idteam']}};
            let data = {
                idteam,
                iduser
            };
            $.get('/Ajax/addMember',data,function(data){
                $('#add-message').html(data);
            });
        });
        

        $('.members').click(function(){
            $('.btn-team-function').attr('class', 'btn-team-function order btn btn-outline-info text-dark border border-0 w-100');
            var e = $(this);
            e.attr('class', 'btn-team-function order btn btn-info text-dark border border-0 w-100' );
            $('.teamfunction').css('display','none');
            $('#members').css('display','block');
        });

        $('.outofteam').click(function(){
            $('.btn-team-function').attr('class', 'btn-team-function order btn btn-outline-info text-dark border border-0 w-100');
            var e = $(this);
            e.attr('class', 'btn-team-function order btn btn-info text-dark border border-0 w-100' );
            let idteam = {{$teams['idteam']}};
            let data2 = {
                username: "{{Session::get('username')}}",
                iduser: {{$iduser}},
                idteam: idteam,
                avatar: "{{Session::get('avatar')}}",
                content: "đã rời nhóm",
                type: 1
            }
            socket.emit('message',data2);
            let data = {idteam: idteam, iduser: {{$iduser}}};
            $.get('/Ajax/outTeam',data,function(data){
                window.location.href = '/Home';
            });
        });

        $('.team').click(function(){
            let idteam = $(this).attr('id');
            window.location.href = "/Messenger/" + idteam;
        });

        $('#makeorder').click(function(){
            let phonenumber = $('#phonenumber').val();
            let n = phonenumber.length;
            let flag = true;
            if(n!=10) flag = false;
            else{
                for(let i = 0; i < n; ++i){
                    let c = phonenumber.charAt(i);
                    if(!('0'<=c&&c<='9')){
                        flag = false;
                        break;
                    }
                }
            }
            if(flag==false) $('#error-phone').html("Số điện thoại không hợp lệ");
            else{
                let hour = $('#hour').val();
                let minute = $('#minute').val();
                let idteam = {{$teams['idteam']}};
                let data = {
                    hour,
                    minute,
                    phonenumber,
                    idteam
                }
                $.get("/Ajax/makeOrder",data,function(data){
                    window.location.reload();
                });
            }
            
        });

        $('.expulsion').click(function(){
            let e = $(this);
            let username = e.prev().find('span').html();
            let avatar = e.prev().find('img').attr('src');
            avatar = avatar.split("\/");
            avatar = avatar[avatar.length-1];
            let iduser = e.val();
            let data = {idteam: idteam, iduser: iduser};
            $.get('/Ajax/outTeam',data,function(data){
                e.parent().remove();
                let data2 = {
                    username: username,
                    iduser: iduser,
                    idteam: idteam,
                    avatar: avatar,
                    content: "đã rời nhóm",
                    type: 1
                }
                socket.emit('message',data2);
                });
        });

    </script>
</html>