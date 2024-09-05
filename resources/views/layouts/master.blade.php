<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Hotel Reservation System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <!-- site Favicon -->
    <link rel="icon" href="/assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="/assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="/assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ asset('/assets/css/vendor/ecicons.min.css') }}" />


    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/slick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/plugins/bootstrap.css') }}" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}" />

    <!-- Background css -->
    @livewireStyles
</head>
<!--end::Head-->

<!--begin::Body-->

<body>

    <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Header start  -->
    <header class="ec-header">

        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Site Logo" /><img
                                        class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="col-md-12 align-self-center">
                                <div class="ec-main-menu">
                                    <ul>
                                        <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
                                        <li><a href="{{ route('reservations.index') }}">Reserve a Room</a></li>
                                        <li><a href="{{ route('reservations.list') }}">Reservation List</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->


                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->

    </header>
    <!-- Header End  -->

    <section class="ec-page-content section-space-p">
        {{ $slot }}
    </section>

    @include('layouts.scripts')

    <!--end::Main-->

</body>
<!--end::Body-->

</html>
