
    <?php include("userHeader.php") ?>
            <div class="d-flex flex-row w-100">
                <!--Tin nhắn nhóm -->
                <div class='w-50 d-flex flex-column bg-light border border-1 m-auto' style="height: 70vh; overflow-y: auto">
                    <div class="border border-1 d-flex align-items-center justify-content-center" style="height: 55px">
                        <span class="text-success h5 fw-bold">Nhắn tin với bí thư</span>
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
                    <div class="align-items-center bg-light" style="width: 49.4%; height: 50px; position: fixed; bottom: 7vh">
                        <input id="textInput" class="form-control" style="width: 95%; border-radius: 20px;" type="text" name="question" placeholder="Nhập tin nhắn">
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
                                iduser: {{Session::get('iduser')}},
                                content: rawText,
                                type: 0,
                                state: 1,
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