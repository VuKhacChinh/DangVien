
        <?php include("customerheader.php") ?>
            <div class='d-flex flex-column justify-content-center align-items-center' style="overflow-y: scroll; height:100vh; width: 100%; background-color: #dedede">
            @foreach ($listres as $res)
                <a href='RestaurantDetail/{{$res->idres}}' class='shadow btn btn-light p-2 m-2 d-flex justify-content-center align-items-center w-50'>
                    <div class="col-2">
                        <img src = '{{URL::asset($res->avatar)}}' style="width:100px; height: 100px"/>
                    </div>
                    <div class='res-infor text-primary text-center col-6'>
                        <h2>{{$res->name}}</h2>
                        <h6>Địa chỉ: {{$res->address}}</h6>
                    </div>
                    <div class='quantity col-4'>
                        <div style='font-size: 100%;' class="text-warning">
                            <span>
                                @if($res->numreview>0)
                                    {{round($res->numstar/$res->numreview,1)}}
                                    <i class="fas fa-star"></i>
                                @endif
                            </span>
                        </div>
                        <div >
                            <span style='font-size: 100%;' class="text-success">{{$res->numreview}} lượt đánh giá</span>
                        </div>
                        <div>
                            <span style='font-size: 100%;' class="text-primary">{{$res->numlike}} lượt thích</span>
                        </div>   
                    </div>
                </a>
            @endforeach
            <div class="m-2">{{$listres->links()}}</div>
            </div>
            
    </body>
</html>