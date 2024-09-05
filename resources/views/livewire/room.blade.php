<div class="container">
    <div class="shop-pro-content">
        <div class="shop-pro-inner">
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                        <div class="ec-product-inner">
                            <div class="ec-pro-image-outer">
                                <div class="ec-pro-image">
                                    <a href="#" class="image">
                                        <img class="main-image" src="{{ asset($room->image_link) }}"
                                            alt="{{ $room->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="#">{{ $room->name }}</a></h5>

                                <span class="">{{ $room->description }}</span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
