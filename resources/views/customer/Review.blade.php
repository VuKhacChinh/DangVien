
        <?php include("customerheader.php") ?>
        <div class="row bg-dark p-2 justify-content-around align-items-center w-75" style="margin-top: 10px; margin-left: auto; margin-right: auto;">
            <a href="/RestaurantDetail/{{$reviews['idres']}}" class="m-1 col-2 btn btn-outline-info">Nhà hàng</a>
            <a href="/RestaurantFood/{{$reviews['idres']}}" class="m-1 col-2 btn btn-outline-info">Món ăn</a>
            <button value =  
                    "<?php if($reviews['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>" class='heart col-2 btn btn-outline-danger border border-0'><i class="fas fa-heart" style="font-size: 170%; color: 
                    <?php if($reviews['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>
                " 
                    ></i></button>
            <a href="/RestaurantPromotion/{{$reviews['idres']}}" class="m-1 col-2 btn btn-outline-info" >Ưu đãi</a>
            <a href="/Review/{{$reviews['idres']}}" class="m-1 col-2 btn btn-outline-info">Xem đánh giá</a>
        </div>
        <div class='content d-flex flex-row w-75 m-auto'
        style="background-image:url('{{URL::asset($reviews['res']->avatar)}}');
                            background-repeat: no-repeat;
                            background-size: 100% 100%;
                            height: 80vh;">
            <div class='d-flex flex-column align-items-start m-2' style='width: 30%; height: 80 vh;'>
                <div id="reviewing" class="w-100 bg-dark text-center m-auto">
                    <h4 class="m-auto text-center text-info p-3">Viết đánh giá</h4>
                    <textarea id='reviewcontent' class="form-control" rows="7" aria-label="With textarea">
                    </textarea>
                    <div class=" d-flex justify-content-center align-items-center">
                        <i id="1" class="star btn far fa-star text-warning"></i>
                        <i id="2" class="star btn far fa-star text-warning"></i>
                        <i id="3" class="star btn far fa-star text-warning"></i>
                        <i id="4" class="star btn far fa-star text-warning"></i>
                        <i id="5" class="star btn far fa-star text-warning"></i>
                    </div>
                    <h4 id="warningstar" style="display:none" class='text-center text-danger'>Hãy chọn số sao</h4>"
                    <button id='sendreview' class="btn btn-outline-info m-2">Gửi đánh giá</button>
                </div>
            </div>
            <div style='width: 65%; height: 80vh;' class='d-flex justify-content-center m-auto align-items-start'>
                <div class='list-group m-2 p-2 w-75' style="background-color: #fff">
                    <div class=" d-flex justify-content-center display-6 m-1">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                    </div>
                    <select id="star" class="form-select form-select m-3 w-25 m-auto bg-dark text-info">
                        <option value="6">Tất cả</option>
                        <option value="5"
                        <?php
                        if(isset($reviews["numstar"])&&$reviews["numstar"]==5) echo "selected";
                        ?>
                        >5 sao</option>
                        <option value="4"
                        <?php
                        if(isset($reviews["numstar"])&&$reviews["numstar"]==4) echo "selected";
                        ?>
                        >4 sao</option>
                        <option value="3"
                        <?php
                        if(isset($reviews["numstar"])&&$reviews["numstar"]==3) echo "selected";
                        ?>
                        >3 sao</option>
                        <option value="2"
                        <?php
                        if(isset($reviews["numstar"])&&$reviews["numstar"]==2) echo "selected";
                        ?>
                        >2 sao</option>
                        <option value="1"
                        <?php
                        if(isset($reviews["numstar"])&&$reviews["numstar"]==1) echo "selected";
                        ?>
                        >1 sao</option>
                    </select>
                    <div style="overflow-y:auto; overflow-x: hidden; height: 65vh;">
                    @foreach($reviews['reviews'] as $review)
                        <div class="reviewing">
                            <div class="d-flex flex-row p-3">
                                <img src="{{URL::asset($review->avatar)}}" class="border border-1" style="width:45px; height: 45px; border-radius: 50%"/>
                                <div class="d-flex flex-column">
                                    <span class="text-danger">{{$review->name}}</span>
                                    <span class="text-primary" style="font-size: 70%">{{$review->time}}</span>
                                </div>
                            </div>
                            <div class="ms-5">
                                <div>
                                    <?php
                                    for($i=0; $i < $review->numstar; ++$i){
                                        echo "<i class='fas fa-star text-warning'></i>";
                                    }
                                    ?>
                                </div>
                                <div>
                                    {{$review->content}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        var numstar = 0;
        $('#star').change(function(){
            let e = $(this);
            let numstar = e.val();
            let loc;
            if(numstar==6) loc = "/Review/{{$reviews['idres']}}";
            else loc = "/Review/{{$reviews['idres']}}/" + numstar;
            window.location.href = loc;
        });

        $(".star").click(function(){
            numstar = $(this).attr('id');
            for(let i = 1; i <= 5; ++i){
                $('#'+i).attr('class',"star btn far fa-star text-warning");
            }
            for(let i = 1; i <= numstar; ++i){
                $('#'+i).attr('class',"star btn fas fa-star text-warning");
            }
        });

        $('#sendreview').click(function(){
            let ateFlag = {{$reviews['ateFlag']}};
            if(ateFlag==0) {
                alert('Bạn chưa từng ăn ở đây');
                return;
            }
            if(numstar==0){
                $('#warningstar').css({'display':'block'});
                setTimeout(function(){
                    $('#warningstar').css({'display':'none'});
                },3000);
                return;
            }
            let idres = {{$reviews['idres']}};
            let iduser = {{Session::get('iduser')}};
            let reviewContent = $('#reviewcontent').val();
            let data = {
                idres,
                iduser,
                reviewContent,
                numstar
            }
            $.get('/Ajax/sendReview',data,function(data){
                location.reload();
            });
        });

        var addedNumber = {{$reviews['flag']}};
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
            let idres = {{$reviews['idres']}};
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
        
    </script>
</html>