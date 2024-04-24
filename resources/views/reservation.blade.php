@extends('layouts.guest')
@section('contents')
    <section class="site-hero inner-page overlay" style="background-image: url({{ asset('images/hero_4.jpg') }})"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">{{ $room['type'] }} - Room {{ $room['number'] }}</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="/">Home</a></li>
                        <li>&bullet;</li>
                        <li>Romm Details</li>
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

    <section class="section bg-light">

        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade">Great Offers</h2>
                    <p data-aos="fade">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                        the Semantics, a large language ocean.</p>
                </div>
            </div>

            <div class="site-block-half d-block d-lg-flex bg-white shadow round my-4" data-aos="fade" data-aos-delay="100">
                <a href="#" class="image d-block bg-image-2" style="background-image: url({{ $room['image'] }});"></a>
                <div class="text">
                    <span class="d-block mb-4"><span
                            class="display-4 text-primary">{{ '₦' . number_format($room['price'], 2) }}</span> <span
                            class="text-uppercase letter-spacing-2">/ per night</span> </span>
                    <h2 class="mb-4">{{ $room['type'] }} Room</h2>
                    <p>
                    <ul>
                        <li class="font-weight text-capitalize">
                            <span>Room Character: </span> {{ $room['character'] }}
                        </li>
                        <li>
                            <span class="font-weight">Bed: </span> {{ $room['bed_type'] }}
                        </li>
                        <li class="text-capitalize">
                            <span class="font-weight ">Floor: </span> {{ $room['floor'] }}
                        </li>
                        {{-- <li>
                            <span class="font-weight">Status: </span> <span class="btn">{{ $room['status'] }}</span>
                        </li> --}}
                    </ul>
                    </p>
                    <p>
                        @if ($room['status'] == 'available')
                            <button href="#book" class="btn btn-primary text-white">Book Now</button>
                        @else
                            <p class="btn bg-secondary text-white disabled">Not Available</p>
                        @endif
                    </p>
                </div>
            </div>
            {{-- <div class="site-block-half d-block d-lg-flex bg-white mt-4" data-aos="fade" data-aos-delay="200">
                <a href="#" class="image d-block bg-image-2 order-2"
                    style="background-image: url('images/img_2.jpg');"></a>
                <div class="text order-1">
                    <span class="d-block mb-4"><span class="display-4 text-primary">$299</span> <span
                            class="text-uppercase letter-spacing-2">/ per night</span> </span>
                    <h2 class="mb-4">Presidential Room</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <p><a href="#" class="btn btn-primary text-white">Book Now</a></p>
                </div>
            </div> --}}
        </div>
    </section>

    <section class="section contact-section" id="next">
        <div class="container">
            <div class="row">
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

                    <form action="{{ route('book', $room['id']) }}" method="post" class="bg-white p-md-5 p-4 mb-5 border">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="fname">First Name</label>
                                <input type="text" id="fname" value="{{ old('firstname') }}" name="firstname"
                                    class="form-control">
                                @error('firstname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="lname">Last Name</label>
                                <input type="text" id="lname" name="lastname" value="{{ old('lastname') }}"
                                    class="form-control">
                                @error('lastname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="row" id="book">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                    class="form-control ">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control ">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="checked_in">Date Check In</label>
                                <input type="date" id="checked_in" name="checked_in" value="{{ old('checked_in') }}"
                                    class="form-control">
                                @error('checked_in')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="text-black font-weight-bold" for="checked_out">Date Check Out</label>
                                <input type="date" id="checked_out" name="checked_out"
                                    value="{{ old('checked_out') }}" class="form-control">
                                @error('checked_out')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 form-group">
                                @if ($room['status'] == 'available')
                                    <input type="submit" value="Reserve Now"
                                        class="btn btn-primary text-white py-3 px-5 font-weight-bold">
                                @else
                                    <p class="btn bg-secondary text-white disabled">Not Available</p>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">
                        <div class="col-md-10 ml-auto contact-info">
                            <p><span class="d-block">Address:</span> <span class="text-black"> 98 West 21th Street, Suite
                                    721 New York NY 10016</span></p>
                            <p><span class="d-block">Nig Tel:</span> <span class="text-black"> (+234) 708 1353 229</span>
                            </p>
                            <p><span class="d-block">Email:</span> <span class="text-black"> info@roomstatus.uk</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
