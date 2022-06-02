
    <?php include("customerheader.php") ?>
    <style>
        .avatar:hover{
            border: 1px solid green;
        }
    </style>
    <?php
    function showPost($post){
    ?>
        <li style='margin: 2% 10%; padding:'>
            <div class='posting'>
                <div class='posting_user d-flex flex-row align-items-center'>
                    <a href='RestaurantDetail/{{$post->idres}}' class='avatar'>
                        <img src='{{URL::asset($post->avatar)}}' style='width: 40px; height: 40px; border-radius:50%;'>
                    </a>
                    <div class='infor_postuser'>
                        <div class='username' style='font-weight: bold'>
                            {{$post->name}}
                        </div>
                        <div class='post_time'>
                            <?php
                                $cur_date = strtotime(date('Y-m-d H:i:s'));
                                $post_date = strtotime($post->time); 
                                $minute = round(abs($cur_date-$post_date)/60);
                                $hour = round($minute/60);
                                if($minute < 60) echo $minute.' phút';
                                else if($hour < 24) echo $hour.' giờ';
                                else if($hour < 24*30) echo round($hour/24).' ngày';
                                else if($hour < 24*30*12 ) echo round($hour/24/30).' tháng';
                                else echo round($hour/24/30/12).' năm';
                            ?>
                        </div>
                    </div>
                </div>
                <p class='main_content_post'>{{$post->content}}</p>
                <div class='image-content row m-auto' style='width: 90%; height: 70vh'>
                    <img src='{{$post->img1}}' class='col-6 p-1' style='height: 50%' />
                    <img src='{{$post->img2}}' class='col-6 p-1' style='height: 50%'/>
                    <img src='{{$post->img3}}' class='col-6 p-1' style='height: 50%'/> 
                    <img src='{{$post->img4}}' class='col-6 p-1' style='height: 50%'/>
                </div>
            </div>
        </li>
    <?php
    }
    ?>
        <?php
        $posts = $home['posts'];
        $teams = $home['teams'];
        ?>
        <div class="content d-flex flex-row h-100">
            <div id="main-navbar" style=" background-color: #fff; overflow-y:auto; scrollbar-width: 2px; width: 20%;">
                <!-- Danh much chinh -->
                <ul class="list-group">
                    <h4 class='bg-light m-0'>Nhà hàng và đồ ăn</h4>
                    <a href='Restaurant' class="list-group-item list-group-item-action list-group-item-light border border-0"><i class="fas fa-hotel text-warning"></i> Xem các nhà hàng</a>
                    <a href='FavoriteRestaurant' class="list-group-item list-group-item-action list-group-item-light border border-0"><i class="fas fa-synagogue text-info"></i> Nhà hàng yêu thích</a>
                </ul>
            </div>
            <!-- Xem bai viet -->
            <div style='width:63%; overflow-y:auto; scrollbar-width: 2px;' id='post' class='p-10 text-center justify-content-center'>
                <ul class='list-group' id="post_list">
                    <?php
                    $i = 0;
                    $numPost = count($posts);
					while($i < $numPost && $i < 2){
                    ?>
                        {{showPost($posts[$i])}}
                    <?php
                        ++$i;
                    }
                    ?>
                </ul> 
            </div>

            <div style="overflow-y:auto; scrollbar-width: 2px; width: 17%; background-color: #fff;">
                <ul class="list-group">
                <h4 class='bg-light m-0'>Nhóm của bạn</h4>
                    @foreach($teams as $team)
                        <a href='/Messenger/{{$team->idteam}}' class="btn btn-outline-secondary border-0">
                            <img src='{{URL::asset($team->avatar)}}' style='width: 30px; height: 30px'> Nhóm {{$team->name}}
                        </a>
                    @endforeach
				</ul>
            </div>
        </div>
        <script>
            $("#home").addClass('activation');

            let i = {{$i}};
            let numPost = {{$numPost}};
            $('#post').on('scroll', function() {
                if(i >= numPost) return;
                else if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight - 300) {
                    let post = `{{$i<$numPost?showPost($posts[$i]):""}}`;
                    $("#post_list").append(post);
                    ++i;
                }
            });
        </script>
    </body>
</html>