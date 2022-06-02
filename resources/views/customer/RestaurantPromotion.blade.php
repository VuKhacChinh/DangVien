
        <?php include("customerheader.php") ?>
        <div class='content d-flex flex-column align-items-center justify-content-center'
        style="height: 92vh;">
             <div class="row bg-dark p-2 justify-content-around align-items-center w-75" style="margin-top: -15px; margin-left: auto; margin-right: auto;">
                <a href="/RestaurantDetail/{{$promotions['idres']}}" class="m-1 col-2 btn btn-outline-info">Nhà hàng</a>
                <a href="/RestaurantFood/{{$promotions['idres']}}" class="m-1 col-2 btn btn-outline-info">Món ăn</a>
                <button value =  
                    "<?php if($promotions['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>" class='heart col-2 btn btn-outline-danger border border-0'><i class="fas fa-heart" style="font-size: 170%; color: 
                    <?php if($promotions['flag']==-1) echo 'red';
                    else echo 'white';
                    ?>
                " 
                    ></i></button>
                <a href="/RestaurantPromotion/{{$promotions['idres']}}" class="m-1 col-2 btn btn-outline-info" >Ưu đãi</a>
                <a href="/Review/{{$promotions['idres']}}" class="m-1 col-2 btn btn-outline-info">Xem đánh giá</a>
            </div>
            <div style='width: 75%; height: 80vh;' class='d-flex flex-column justify-content-center'>
                <div class='list-group p-5 w-100 h-100' style="background-image:url({{URL::asset($promotions['res']->avatar)}});
                            background-repeat: no-repeat;
                            background-size: 100% 100%; overflow-y: auto; overflow-x: hidden;">
                    <h3 class='text-primary text-center'>Ưu đãi chung</h3>
                    @foreach($promotions['promotions'] as $promotion)
                    <div class="row m-2 p-3 list-group-item">
                        <img src="{{URL::asset($promotion->avatar)}}" style="width: 100px; height: 100px;" class="col-2"/>
                        <span class="col-10 text-success">{{$promotion->content}}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    
<script>
        var addedNumber = {{$promotions['flag']}};
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
            let idres = {{$promotions['idres']}};
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