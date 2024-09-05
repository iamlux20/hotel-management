<div class="container-fluid">
    <div class="row pb-5">
        <div class="col-md-12 text-center">
            <div class="section-title">
                <h2 class="ec-bg-title">Reserve a Room</h2>
                <h2 class="ec-title">Reserve a Room</h2>
                <p class="sub-title mb-3"></p>
            </div>
        </div>

        <div class="ec-register-wrapper">
            <div class="ec-register-container">
                <div class="ec-register-form">
                    <form wire:submit.prevent="search">

                        <span class="ec-register-wrap ec-register-half">
                            <label>From *</label>
                            <input type="date" name="from" wire:model.live="from"
                                placeholder="Enter check-in date" required min="{{ today()->format('Y-m-d') }}" />
                            <div>
                                @error('from')
                                    {{ $message }}
                                @enderror
                            </div>
                        </span>

                        <span class="ec-register-wrap ec-register-half">
                            <label>To *</label>
                            <input type="date" name="to" wire:model="to" placeholder="Enter check-out date"
                                required
                                min="{{ $from ? \Carbon\Carbon::parse($from)?->addDay()->format('Y-m-d') : today()->format('Y-m-d') }}" />

                            <div>
                                @error('to')
                                    {{ $message }}
                                @enderror
                            </div>
                        </span>

                        <span class="ec-register-wrap ec-register-btn">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="shop-pro-content container">
        <div class="shop-pro-inner list-view">
            <div class="row">
                @if ($availableRooms)
                    @foreach ($availableRooms as $room)
                        @if ($room->reservationDates($from, $to) == 0)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content width-100">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="{{ asset($room->image_link) }}"
                                                    alt="Product">
                                            </a>

                                            <div class="ec-pro-loader"></div>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a
                                                href="product-left-sidebar.html">{{ $room->name }}</a>
                                        </h5>

                                        <div class="ec-pro-list-desc">{{ $room->description }}</div>
                                        <span class="ec-price">
                                            <button class="btn btn-primary"
                                                wire:click="reserve('{{ $room->id }}')">Reserve</button>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

    </div>

    <div class="modal fade " id="reserve" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                @if ($selectedRoom)
                    <form wire:submit="store">

                        <div class="modal-body">
                            <div class="quickview-pro-content">
                                <div class="row">
                                    <span class="ec-quick-title">
                                        Reserve {{ $selectedRoom->name }}
                                    </span>
                                    <button type="button" class="btn-close qty_close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>

                                </div>

                                <div class="row py-3">
                                    <div class="col-12 col-md-6 py-3">
                                        <label>First Name *</label>
                                        <input type="text" name="firstName" wire:model="firstName"
                                            placeholder="First Name" required maxlength="100" />
                                        <div>
                                            @error('firstName')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 py-3">
                                        <label>Last Name *</label>
                                        <input type="text" name="lastName" wire:model="lastName"
                                            placeholder="Last Name" required maxlength="100" />
                                        <div>
                                            @error('lastName')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                    <span class="col-12 py-3">
                                        <label>Email *</label>
                                        <input type="email" name="email" wire:model="email"
                                            placeholder="Email Address" required maxlength="75" />
                                        <div>
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Book!</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        window.addEventListener('show-info-modal', event => {
            $('#reserve').modal('show');
        });

        window.addEventListener('close-info-modal', event => {
            $('#reserve').modal('hide');
            toastr.success(event.detail.returnMessage);
        });
    </script>
@endpush
