
    <?php include("managerHeader.php") ?>
            <div class="content d-flex flex-row w-100">
                <!--Tin nhắn nhóm -->
                <div class='w-50 d-flex flex-column bg-light border border-1 m-auto' style="height: 80vh; overflow-y: auto">
                    <div class="border border-1 d-flex justify-content-center align-items-center" style="height: 55px">
                        <span class="text-primary fw-bold h5">Huy Nguyễn </span>
                    </div>
                    <div id="main_conv" style="height:85% ; overflow-y:auto;">
                    @foreach($messages as $message)
                        <div class="d-flex align-items-center m-3
                            <?php 
                                if($message->type==0) echo "flex-row-reverse text-light";
                                else echo "text-light";
                            ?>
                        ">
                            <span class="<?php if($message->type==0) echo 'bg-primary'; else echo 'bg-success'; ?> p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px; max-width: 50%">
                                {{$message->content}}
                            </span>
                        </div>
                    @endforeach
                    </div>
                    <div class="align-items-center bg-light" style="width: 49.4%; height: 45px; position: fixed; bottom: 3vh">
                        <input id="textInput" class="form-control" style="width: 95%; border-radius: 20px;" type="text" name="question" placeholder="Nhắn tin">
                    </div>
                    <script>
                        var conversation = document.getElementById("main_conv");
                        conversation.scrollTop = conversation.scrollHeight;
                        var socket = io('http://localhost:3000', { transports: ['websocket', 'polling', 'flashsocket'] });
                        socket.on('message', function (data) {
                            var content ="";
                            if(data.type==0) content += '<div class="text-light d-flex flex-row-reverse align-items-center  m-3"><span class="bg-primary p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px; max-width: 50%;">' + data.content + "</span></div>";
                            else content += '<div class="text-light d-flex align-items-center  m-3"><span class="bg-success p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px; max-width: 50%;">' + data.content + "</span></div>";
                            $( "#main_conv" ).append(content);
                            conversation.scrollTop = conversation.scrollHeight;
                        });
                        function chat() {
                            var rawText = $("#textInput").val();
                            if(rawText=="") return;
                            $("#textInput").val("");
                            let data = {
                                iduser: {{$messages[0]->iduser}},
                                content: rawText,
                                type: 1,
                                state: 0,
                            }
                            this.socket.emit('message', data);
                            $.get('/Ajax/Chat',data);
                            
                        }
                        $("#textInput").keypress(function(e) {
                            if (e.which == 13) {
                            chat();
                            }
                        });
                    </script>
                </div>
            </div> 
        </div>   
    </body>
</html>