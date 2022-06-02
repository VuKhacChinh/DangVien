
        <?php include("customerheader.php") ?>
        <div style='width:60%; margin:auto; padding:10px; height: 95vh; overflow-y: auto; background-color: #dedede'>
                @foreach($informs as $inform)
                    <a href="/RestaurantPromotion/{{$inform->idres}}" style="background-color: #fff; text-decoration: none;" class="m-2 row">
                        <span class="bg-info text-light p-2 col-3 text-center"> <img src='{{URL::asset($inform->avatar)}}' class='fluid-image' style='width: 50px; height: 50px; border-radius: 50%'/> {{$inform->name}}</span>
                        <span class="col-9 d-flex align-items-center text-success">{{$inform->content}}</span>
					</a>
                @endforeach
                <div class="text-center m-4">
                    {{$informs->links()}}
                </div>
		</div>
        <script>
            $("#notifycation").addClass('activation');
        </script>
    </body>
</html>