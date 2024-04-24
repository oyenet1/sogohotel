@extends('layouts.guest')
@section('contents')
    <section class="site-hero inner-page overlay" style="background-image: url({{ asset('images/hero_4.jpg') }})"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">Available Rooms</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="/">Home</a></li>
                        <li>&bullet;</li>
                        <li>Rooms</li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->
    <section class="section">
        <div class="container">

            <div class="row">
                @forelse ($rooms as $room)
                    @if ($room['status'] == 'available')
                        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                            <a href="{{ '/room/' . $room['id'] }}" class="room">
                                <figure class="img-wrap">
                                    <img src="{{ $room['image'] }}" alt="{{ $room['number'] }}"
                                        class="img-fluid mb-3 w-100">
                                </figure>
                                <div class="p-3 text-center room-info">
                                    <h2 class="text-capitalize">{{ $room['type'] . ' Room - ' . $room['number'] }}</h2>
                                    <span
                                        class="text-uppercase letter-spacing-1">{{ '₦' . number_format($room['price'], 2) . ' / per night' }}</span>
                                </div>
                            </a>
                        </div>
                    @else
                        @continue
                    @endif
                @empty
                    <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
                        <a href="#" class="room">
                            <figure class="img-wrap">
                                <img src="images/img_1.jpg" alt="Free website template" class="img-fluid mb-3">
                            </figure>
                            <div class="p-3 text-center room-info">
                                <h2>Single Room</h2>
                                <span class="text-uppercase letter-spacing-1">90$ / per night</span>
                            </div>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
