
        <?php include("customerheader.php") ?>
        <div class="row bg-dark p-2 justify-content-around align-items-center w-75" style="margin-top: 10px; margin-left: auto; margin-right: auto;">
            <a href="/RestaurantDetail/{{$foods['idres']}}" class="m-1 col-2 btn btn-outline-info">Nhà hàng</a>
            <a href="/RestaurantFood/{{$foods['idres']}}" class="m-1 col-2 btn btn-outline-info">Món ăn</a>
            <button value =  
                    "<?php if($foods['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>" class='heart col-2 btn btn-outline-danger border border-0'><i class="fas fa-heart" style="font-size: 170%; color: 
                    <?php if($foods['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>
                " 
                    ></i></button>
            <a href="/RestaurantPromotion/{{$foods['idres']}}" class="m-1 col-2 btn btn-outline-info" >Ưu đãi</a>
            <a href="/Review/{{$foods['idres']}}" class="m-1 col-2 btn btn-outline-info">Xem đánh giá</a>
        </div>
        <div class="m-5 d-flex justify-content-center align-items-center text-center w-75 m-auto row" style="height: 80vh;
        background-image:url('{{URL::asset($foods['res']->avatar)}}');
                            background-repeat: no-repeat;
                            background-size: 100% 100%;">
                @foreach($foods['foods'] as $food)
                <div class="col-3">
                    <a href="" class="btn btn-outlight-primary bg-light border border-info border-2">
                        <img src="{{URL::asset($food->avatar)}}" style='width: 180px; height: 200px;'>
                        <h6>{{$food->name}}</h6>
                        <h6>Giá: {{$food->price}} VNĐ</h6>
                    </a>
                </div>
                @endforeach
        </div>
    </body>
    <script>
        var addedNumber = {{$foods['flag']}};
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
            let idres = {{$foods['idres']}};
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